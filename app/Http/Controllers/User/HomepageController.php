<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost;

class HomepageController extends Controller
{
    public function index(){
        $category_posts = CategoryPost::all();
        return view('User.homepage.index',compact('category_posts'));
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
