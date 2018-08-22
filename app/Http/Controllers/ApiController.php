<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Customer;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function addBill(Request $request){
		$customer = new Customer;
		$customer = $request->get("khachhang");
//		$customer->full_name = $request->full_name;
//		$customer->email = $request->email;
//		$customer->address = $request->address;
//		$customer->phone = $request->phone;
//		$customer->note = $request->note;
//		$customer->save();

		dd($customer);
		$bill = new Bill;
		$bill->id_customer = $customer->id;
		$bill->note = $request->note;
		$bill->date_order = date('Y-m-d');
		$bill->payment = $request->payment;
		$bill->total = $total;
		$bill->save();

		$bill_detail = new BillDetail;
		$bill_detail->id_bill = $bill->id;
		$bill_detail->id_product = $item->id;
		$bill_detail->quantity = $item->qty;
		$bill_detail->price = $item->price;
		$bill_detail->save();
	}
}
