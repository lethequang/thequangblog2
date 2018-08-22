<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Customer;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
	public function addBill(Request $request)
	{
		DB::beginTransaction();
		try {
			$customer = new Customer;
			$customer->full_name = $request->input("khachhang.full_name");
			$customer->email = $request->input("khachhang.email");
			$customer->address = $request->input("khachhang.address");
			$customer->phone = $request->input("khachhang.phone");
			$customer->note = $request->input('khachhang.note');
			$customer->save();

			$products = $request->get('sanpham');
			$total = 0;
			foreach ($products as $product) {
				$subtotal = $product['quantity'] * $product['price'];
				$total += $subtotal;
			}
			$bill = new Bill;
			$bill->id_customer = $customer->id;
			$bill->note = $request->input("hoadon.note");
			$bill->date_order = date('Y-m-d');
			$bill->payment = $request->input("hoadon.payment");
			$bill->total = $total;
			$bill->save();

			foreach ($products as $product) {
				$bill_detail = new BillDetail;
				$bill_detail->id_bill = $bill->id;
				$bill_detail->id_product = $product['id_product'];
				$bill_detail->quantity = $product['quantity'];
				$bill_detail->price = $product['price'];
				$bill_detail->save();
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
			return response()->json([
				'status' => 400,
				'message' => 'fail',
			]);
			DB::rollback();
		}
	}
}
