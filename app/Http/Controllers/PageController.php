<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Author;
use Session;
use Hash;
use App\Feedback;

use Illuminate\Http\Request;

class PageController extends Controller
{
	public function getIndex()
	{
		$product = Product::orderBy('id', 'DESC')
			->paginate(9);
		return view('page.home', compact('product'));
	}


	public function getContact()
	{
		return view('page.contact');
	}

	public function postContact(Request $request){
		$contact = new Feedback;
		$contact->name = $request->name;
		$contact->email = $request->email;
		$contact->message = $request->message;
		$contact->save();
		return redirect()->back()->with('message','Tin nhắn của bạn đã được gửi');
	}

	public function getNews()
	{
		return view('page.news');
	}

	public function getType($id)
	{
		$type_product = Product::where('id_category', $id)
			->paginate(9);
		$category = Category::where('id', $id)->first();
		return view('page.category', compact('type_product', 'category'));
	}


	public function getAuthor($id)
	{
		$author_product = Product::where('id_author', $id)
			->paginate('9');
		$author = Author::where('id', $id)->first();
		return view('page.author', compact('author_product', 'author'));
	}


	public function getDetail($slug)
	{
		$product = Product::where('slug', $slug)->first();
		$type_product = Product::where('id_category', $product->id_category)->get();
		$category = Category::where('id', $product->id_category)->first();
		$author = Author::where('id', $product->id_author)->first();
		return view('page.detail', compact('product', 'type_product', 'category', 'author'));
	}
}
