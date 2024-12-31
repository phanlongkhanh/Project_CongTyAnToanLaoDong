<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CategoryPost;

class PostCeremonyController extends Controller
{
    public function index()
    {
        $category = CategoryPost::where('name', 'Thông Tin')->first();
        if ($category) {
            $posts = Post::where('id_category_post', $category->id)->paginate(5);
        } else {
            $posts = collect();
        }
        $category_posts = CategoryPost::all();
        return view('User.post.ceremony.index', compact('posts', 'category_posts'));
    }

    public function view($slug)
    {
        $posts = Post::where('slug', $slug)->first();
        if (!$posts) {
            return redirect()->route('index-post-ceremony')->with('error', 'Không tìm thấy bài viết với slug này.');
        }
        $category_posts = CategoryPost::all();

        return view('User.post.ceremony.view', compact('posts', 'category_posts'));
    }
}
