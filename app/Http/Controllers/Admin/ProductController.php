<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('Admin.product.index');
    }

    public function create(){
        return view('Admin.product.create');
    }

    public function update(){
        return view('Admin.product.update');
    }
}
