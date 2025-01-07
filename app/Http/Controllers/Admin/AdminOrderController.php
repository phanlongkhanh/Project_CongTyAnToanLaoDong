<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {

        $user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $users = Auth::check() ? Auth::user()->name : null;
        $orders = Order::with('cart.product')->paginate(6);
        return view('Admin.order.index', compact('users','orders'));

    }
}
