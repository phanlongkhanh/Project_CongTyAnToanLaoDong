<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Crypt;


class PostNewController extends Controller
{
    public function index()
    {

        $category = CategoryPost::where('name', 'Tin Tức')->first();
        if ($category) {
            $posts = Post::where('id_category_post', $category->id)->paginate(5);
        } else {
            $posts = collect();
        }
        $carts = Cart::where('id_user', Auth::id())->paginate(5);
        $count_carts = Cart::where('id_user', Auth::id())->count();
        $users = Auth::user();
        $category_posts = CategoryPost::all();
        return view('User.post.news.index', compact('posts', 'category_posts', 'count_carts','carts','users'));
    }

    public function view($slug)
    {
        $posts = Post::where('slug', $slug)->first();
        if (!$posts) {
            return redirect()->route('index-post-news')->with('error', 'Không tìm thấy bài viết với slug này.');
        }
        $category_posts = CategoryPost::all();
        $carts = Cart::where('id_user', Auth::id())->paginate(5);
        $count_carts = Cart::where('id_user', Auth::id())->count();
        $users = Auth::user();
        return view('User.post.news.view', compact('posts', 'category_posts','count_carts','carts','users'));
    }


}
