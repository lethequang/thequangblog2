<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
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
		$customer = $this->customer->create([
			'full_name' => $request->get('full_name'),
			'email' => $request->get('email'),
			'address' => $request->get('address'),
			'phone' => $request->get('phone'),
			'note' => $request->get('note'),
		]);
		$bill = $this->bill->create([
			'id_customer' => $customer->id,
			'note' => $request-> get('note'),
			'date_order' =>  date('Y-m-d'),
			'payment' => $request->payment,
			'total' => ($request->get('quantity') * $request->get('price')),
		]);
		$bill_detail = $this->bill_detail->create([
			'id_bill' =>$bill->id,
			'id_product' => $request->get('id_product'),
			'quantity' => $request->get('quantity'),
			'price' => $request->get('price'),
		]);
		return response()->json([
			'status'=> 200,
			'message'=> 'Bill was created successfully',
			'data'=> [$customer, $bill, $bill_detail]
		]);
	}
}
