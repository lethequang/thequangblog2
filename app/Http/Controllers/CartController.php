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
use Illuminate\Http\Request;

class CartController extends Controller
{

	public function getAddToCart(Request $request)
	{
		$product_id = $request->get('product_id');
		$qty = $request->get('qty');
		$product = Product::find($product_id);
		//Cart::add($product_id, $product->title, 1, $product->price );
		$cartInfo = array('id' => $product_id, 'name' => $product->title, 'qty' => $qty, 'price' => $product->price, ['image'=> $product->image]);
		//dd($cartInfo);
		Cart::add($cartInfo);
		$cartItems = Cart::content();
		return view('page.cart',compact('cartItems'));
	}
	public function getDelItemCart(Request $request, $id)
	{
		$oldCart = Session::has('cart') ? Session::get('cart') : NULL;
		$cart = new Cart($oldCart);
		$cart->removeItem($id);
		if (count($cart->items) > 0) {
			Session::put('cart', $cart);
		} else {
			Session::forget('cart');
		}
		//return redirect()->back();
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

	public function postCheckout(Request $request)
	{
		$cartItems = Cart::content();
		$customer = new Customer;
		$customer->full_name = $request->full_name;
		$customer->email = $request->email;
		$customer->address = $request->address;
		$customer->phone = $request->phone;
		$customer->note = $request->note;
		$customer->save();

		if(!$customer){
			die("Fail");
		}

		$bill = new Bill;
		$total = Cart::total();
		$bill->id_customer = $customer->id;
		$bill->note = $request->note;
		$bill->date_order = date('Y-m-d');
		$bill->payment = $request->payment;
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
		return redirect()->back()->with('message', 'Đặt hàng thành công. Đơn hàng đang được xử lý !');

	}
}
