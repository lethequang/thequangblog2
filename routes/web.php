<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// List Page
Route::get('index',[
	'as'=>'home',
	'uses'=>'PageController@getIndex'
]);
Route::get('contact',[
	'as'=>'contact',
	'uses'=>'PageController@getContact'
]);
Route::post('contact',[
	'as'=>'contact',
	'uses'=>'PageController@postContact'
]);
Route::get('news',[
	'as'=>'news',
	'uses'=>'PageController@getNews'
]);
Route::get('category/{id}',[
	'as'=>'category',
	'uses'=>'PageController@getType'
]);
Route::get('author/{id}',[
	'as'=>'author',
	'uses'=>'PageController@getAuthor'
]);
Route::get('{slug}.html',[
	'as'=>'detail',
	'uses'=>'PageController@getDetail'
]);

// End List Page

// Auth Session
Route::get('register',[
	'as'=>'register',
	'uses'=>'AuthController@getRegister'
]);
Route::post('register',[
	'as'=>'register',
	'uses'=>'AuthController@postRegister'
]);
Route::get('login',[
	'as'=>'login',
	'uses'=>'AuthController@getLogin'
]);
Route::post('login',[
	'as'=>'login',
	'uses'=>'AuthController@postLogin'
]);
Route::get('changepass',[
	'as'=>'changepass',
	'uses'=>'AuthController@showChangePassForm',
	'middleware'=>'auth'
]);
Route::post('changepass',[
	'as'=>'changepass',
	'uses'=>'AuthController@doChangePass'
]);
Route::get('logout',[
	'as'=>'logout',
	'uses'=>'AuthController@getLogout'
]);
// End Auth Session

// Cart
Route::get('add-to-cart/{id}',[
	'as'=>'addtocart',
	'uses'=>'CartController@getAddToCart'
]);
Route::get('del-item-cart/{id}',[
	'as'=>'del-item-cart',
	'uses'=>'CartController@getDelItemCart'
]);
Route::get('cart',[
	'as'=>'cart',
	'uses'=>'CartController@getCart'
]);
Route::get('checkout',[
	'as'=>'checkout',
	'uses'=>'CartController@getCheckout'
]);
Route::post('checkout',[
	'as'=>'checkout',
	'uses'=>'CartController@postCheckout'
]);
// End Cart

// Admin
Route::get('admin/product/add','AdminController@showAddProduct');
Route::post('admin/product/add','AdminController@saveAddProduct')->name('product-add');