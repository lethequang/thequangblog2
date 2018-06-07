<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminController extends Controller
{
	public function showAddProduct()
	{
		return view('admin.post.add');
	}


	public function saveAddProduct(Request $request)
	{
		$post = new Product();

		$post->title = $request->input('title');
		$post->id_category = $request->input('id_cat');
		$post->id_author = $request->input('id_auth');
		$post->price = $request->input('price');
		$post->promotion_price = $request->input('promo');
		$post->image = $request->input('image');
		$post->year = $request->input('year');
		$post->quantity = $request->input('quantity');
		$post->description = $request->input('descrip');
		$post->save();
		return redirect()->back()->with('message', 'Thêm bài viết thành công !');
	}
}
