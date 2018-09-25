<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Product;
//use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Session;
use Hash;
use Cart;
use Request;

class CartController extends Controller
{

	public function getAddToCart()
	{
		if (Request::isMethod('post')) {
			$product_id = Request::get('product_id');
			$qty = Request::get('qty');
			$product = Product::find($product_id);
			$cartInfo = [
				'id' => $product_id,
				'name' => $product->title,
				'qty' => $qty,
				'price' => $product->price,
				['image' => $product->image]
			];
			//dd($cartInfo);
			Cart::add($cartInfo);
		}
		//increment the quantity
		if (Request::get('product_id') && (Request::get('increment')) == 1) {
			$rows = Cart::search(function($key, $value) {
				return $key->id == Request::get('product_id');
			});
			$item = $rows->first();
			Cart::update($item->rowId, $item->qty + 1);
		}

		//decrease the quantity
		if (Request::get('product_id') && (Request::get('decrease')) == 1) {
			$rows = Cart::search(function($key, $value) {
				return $key->id == Request::get('product_id');
			});
			$item = $rows->first();
			Cart::update($item->rowId, $item->qty - 1);
		}
		$cartItems = Cart::content();
		//dd($cartItems);
		return view('page.cart',compact('cartItems'));
	}

	public function getDelItemCart()
	{
		$rows = Cart::search(function($cartItem, $rowId) {
			$cartItem->id == Request::get('product_id');
			$rowId = $cartItem->rowId;
			return $rowId;
			//dd($rowId);
		});
		$item = $rows->first();
		Cart::remove($item->rowId);
		return redirect()->back();
	}

	public function getCart()
	{
		$cartItems = Cart::content();
		return view('page.cart',compact('cartItems'));
	}

	public function getCheckout()
	{
		$cartItems = Cart::content();
		//dd($cartItems);
		return view('page.checkout',compact('cartItems'));
	}

	public function postCheckout()
	{
		$cartItems = Cart::content();
		$customer = new Customer;
		$customer->full_name = Request::get('full_name');
		$customer->email = Request::get('email');
		$customer->address = Request::get('address');
		$customer->phone = Request::get('phone');
		$customer->note = Request::get('note');
		$customer->save();

		if(!$customer){
			die("Fail");
		}

		$bill = new Bill;
		$total = Cart::total();
		$bill->id_customer = $customer->id;
		$bill->note = Request::get('note');
		$bill->date_order = date('Y-m-d');
		$bill->payment = Request::get('payment');
		$bill->total = $total;
		$bill->save();

		foreach ($cartItems as $item) {
			$bill_detail = new BillDetail;
			$bill_detail->id_bill = $bill->id;
			$bill_detail->id_product = $item->id;
			$bill_detail->quantity = $item->qty;
			$bill_detail->price = $item->price;
			$bill_detail->save();
		}
		Cart::destroy();
		return redirect()->back()->with('message', 'Đặt hàng thành công. Đơn hàng đang được xử lý!');

	}
}
