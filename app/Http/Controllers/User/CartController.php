<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{
    public function index()
    {
        return view('User.cart.index');
    }

    //hàm thêm vào giỏ hàng
    public function addToCart(Request $request)
    {
        
    }

}
