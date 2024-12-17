<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CategoryPost;


class UserPostController extends Controller
{
    public function index(){
        $category_posts = CategoryPost::all();
        $posts = Post::all();
        return view('User.post.index',compact('posts','category_posts'));
    }

    public function view($id){
       
        $posts = Post::find($id);
        $category_posts = CategoryPost::all();
        if (!$posts) {
            return redirect()->route('index-post-user')->with('error', 'Không tìm thấy bài viết với ID này.');
        }
        return view('User.post.view',compact('posts','category_posts'));
    }
}
