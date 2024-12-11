<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.product.index', compact('users'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.product.create', compact('users'));
    }

    public function update()
    {
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.product.update', compact('users'));
    }
}
