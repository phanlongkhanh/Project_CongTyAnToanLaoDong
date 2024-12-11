<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Admin.login.index');
    }


    public function LogOut()
    {
        try {
            Auth::logout();
            return redirect()->route('index-login')->with('message', 'Đăng Xuất Thành Công !');
        } catch (\Exception $e) {
            return redirect()->route('index-login')->with('error', 'Có lỗi xảy ra trong quá trình đăng xuất!');
        }
    }

    public function Login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index-dashboard');
        }

        return redirect()->back()
            ->withInput()
            ->withErrors(['name' => 'Tài khoản hoặc mật khẩu không chính xác']);
    }

}
