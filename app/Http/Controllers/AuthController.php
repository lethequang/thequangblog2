<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{

	public function getRegister()
	{
		if (Auth::check()) {
			return redirect()->route('home');
		} else {
			return view('page.register');
		}
	}


	public function postRegister(Request $request)
	{
		$this->validate($request,
			[
				'email' => 'required|email|unique:users,email',
				'password' => 'required|min:6|max:20',
				'name' => 'required',
				'full_name' => 'required',
				're_password' => 'required|same:password',
			],
			[
				'email.required' => 'Địa chỉ email không được để trống',
				'email.email' => 'Định dạng email không hợp lệ',
				'name.unique' => 'Tài khoản này đã có người sử dụng',
				'email.unique' => 'Email này đã có người sử dụng',
				'password.required' => 'Mật khẩu không được để trống',
				're_password.same' => 'Mật khẩu không trùng nhau',
				'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
				'name.required' => 'Tài khoản không được để trống',
				'full.name' => 'Tên không được để trống',
				're_password.required' => 'Nhập lại mật khẩu xác thực',
			]);
		$user = new User();
		$user->name = $request->name;
		$user->full_name = $request->full_name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->save();
		return redirect('login')->with('reg-message', 'Đăng ký tài khoản thành công. Vui lòng đăng nhập để tiếp tục');
	}


	public function getLogin()
	{
		if (Auth::check()) {
			return redirect()->route('home');
		} else {
			return view('page.login');
		}
	}


	public function postLogin(Request $request)
	{
		$this->validate($request,
			[
				'name' => 'required',
				'password' => 'required|min:6|max:20',
			],
			[
				'name.required' => 'Tài khoản không được để trống',
				'password.required' => 'Mật khẩu không được để trống',
				'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
				'password.max' => 'Mật khẩu không được lớn hơn 20 kí tự',
			]
		);
		if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
			return redirect()->route('home');
		} else {
			return redirect()->back()->with('message', 'Tài khoản hoặc mật khẩu không chính xác');
		}
	}


	public function showChangePassForm()
	{
		return view('page.changepassword');
	}


	public function doChangePass(Request $request)
	{
		if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
			// The passwords matches
			return redirect()->back()->with("error", "Mật khẩu hiên tại không đúng.");
		}

		if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
			//Current password and new password are same
			return redirect()->back()->with("error", "Mật khẩu mới không được trùng với mật khẩu cũ.");
		}

		$this->validate($request, [
			'current-password' => 'required',
			'new-password' => 'required|string|min:6|confirmed',
		],
			[
				'curent-password.required' => 'Mật khẩu hiện tại không được để trống',
				'new-password.required' => 'Mật khẩu mới không được để trống',
				'new-password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
				'new-password.confirmed' => 'Mật khẩu mới và mật khẩu xác nhận không trùng nhau'
			]
		);

		//Change Password
		$user = Auth::user();
		$user->password = bcrypt($request->get('new-password'));
		$user->save();

		return redirect()->back()->with("success", "Mật khẩu được thay đổi thành công !");

	}


	public function getLogout()
	{
		Auth::logout();
		return redirect()->route('home');
	}


	// admin

	public function getAdminLogin()
	{
		return view('admin.login');
	}


	public function postAdminLogin(Request $request)
	{
		if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
			return redirect()->intended(route('admin-index'));
		} else {
			return redirect()->back()->with('message', 'Tài khoản hoặc mật khẩu không chính xác');
		}
	}
	public function getAdminLogout()
	{
		Auth::guard('admin')->logout();
		return redirect()->route('admin-login');
	}


}
