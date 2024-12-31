<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost;
use App\Models\Product;
class UserProductController extends Controller
{
    public function index(){
        $category_posts = CategoryPost::all();
        $products = Product::all();
        return view('User.product.index',compact('category_posts','products'));
    }
    
   
}
