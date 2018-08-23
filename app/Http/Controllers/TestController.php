<?php

namespace App\Http\Controllers;

use DB;
use http\Env\Response;
use Validator;
use Illuminate\Http\Request;
use App\Bill;
use App\Customer;
use App\BillDetail;

class TestController extends Controller
{
	private $customer;

	private $bill;

	private $bill_detail;


	public function __construct(Customer $customer, Bill $bill, BillDetail $bill_detail)
	{
		$this->customer = $customer;
		$this->bill = $bill;
		$this->bill_detail = $bill_detail;
	}


	public function getBill()
	{
		$bills = Bill::get();
		return response()->json($bills);
	}


	public function addBill(Request $request)
	{
		DB::beginTransaction();
		try {
			$validator = Validator::make($request->all(), [
				'khachhang.full_name' => 'required',
				'khachhang.email' => 'required|email',
				'khachhang.address' => 'required',
				'khachhang.phone' => 'required',
				'khachhang.note' => 'required'
			],
				[
					'khachhang.full_name.required' => 'Name is required',
					'khachhang.email.required' => 'Email is required',
					'khachhang.email.email' => 'Incorrect Email',
					'khachhang.address.required' => 'Address is required',
					'khachhang.phone.required' => 'Phone is required',
					'khachhang.note.required' => 'Note is required',
				]
			);
			if ($validator->fails()) {
				return response()->json([
					'status' => 422,
					'message' => 'Validation Failed',
					'errors' => $validator->errors(),
				], 422);
			}
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
				'payment' => $request->input('hoadon.payment'),
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
					'sanpham' => $products,
				],
			]);
		} catch (\Exception $e) {
			DB::rollback();
			return response()->json([
				'status' => 400,
				'message' => 'Fail',
			]);
		}
	}
}
