<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class MasterController extends Controller
{
    public function index(){
        $products = Product::paginate(5);
        return view('Layout.master',compact('products'));
    }
}
