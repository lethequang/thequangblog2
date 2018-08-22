<?php

namespace App\Http\Controllers;

use DB;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Bill;
use App\Customer;
use App\BillDetail;

class TestController extends Controller
{
	private $customer;
	private $bill;
	private $bill_detail;

	public function __construct(Customer $customer, Bill $bill, BillDetail $bill_detail )
	{
		$this->customer = $customer;
		$this->bill = $bill;
		$this->bill_detail = $bill_detail;
	}
	public function getBill(){
    	$bills = Bill::get();
    	return response()->json($bills);
	}

	public function addBill(Request $request){
		DB::beginTransaction();
		try {
			$customer = $this->customer->create($request->get('khachhang'));
			$products = $request->get('sanpham');
			$total = 0;
			foreach ($products as $product) {
				$subtotal = $product['quantity'] * $product['price'];
				$total += $subtotal;
			}
			$bill = $this->bill->create([
				'id_customer' => $customer->id,
				'date_order' => date('Y-m-d'),
				'total' => $total,
				'note' => $request->input('hoadon.note'),
				'payment' => $request->input('hoadon.payment')
			]);
			foreach ($products as $product) {
				$product['id_bill'] = $bill->id;
				$this->bill_detail->create($product);
			}
			DB::commit();
			return response()->json([
				'status' => 200,
				'message' => 'Success',
				'data' => [
					'khachhang' => $customer,
					'hoadon' => $bill,
					'sanpham' => $products
				]
			]);
		} catch (\Exception $e) {
			return response()->json([
				'status' => 400,
				'message' => 'fail',
			]);
			DB::rollback();
		}
	}
}
