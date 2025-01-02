<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;



class HomepageController extends Controller
{
    public function index(){
        $category_posts = CategoryPost::all();
        $carts = Cart::paginate(5);
        $count_carts = Cart::count();
        return view('User.homepage.index',compact('category_posts','carts','count_carts'));
    }

    public function indexIntroduce(){
        $category_posts = CategoryPost::all();
        return view('User.introduce.index',compact('category_posts'));
    }

    public function indexRecruitment(){
        $category_posts = CategoryPost::all();
        return view('User.recruitment.index',compact('category_posts'));
    }
}
