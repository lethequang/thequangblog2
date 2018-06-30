<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Product;

class AdminController extends Controller
{
	public function showAddProduct()
	{
		$category = Category::all();
		$author = Author::all();
		return view('admin.post.add',compact('category','author'));
	}

	public function saveAddProduct(Request $request)
	{
		$post = new Product();

		$post->title = $request->input('title');
		$post->id_category = $request->input('id_cat');
		$post->id_author = $request->input('id_auth');
		$post->price = $request->input('price');

		$post->year = $request->input('year');
		$post->quantity = $request->input('quantity');
		$post->description = $request->input('post_content');

		$image = $request->file('image')->getClientOriginalName();
		$request->file('image')->move(public_path('/images'), $image);
		$post->image = $image;

		$post->save();
		return redirect()->back()->with('success', 'Thêm bài viết thành công !');
	}

	public function showAddCategory(){
		return view('admin.category.add');
	}
	public function saveAddCategory(Request $request)
	{
		$post = new Category();

		$post->name = $request->input('name');
		$post->save();
		return redirect()->back()->with('message', 'Thêm bài viết thành công !');
	}
}
