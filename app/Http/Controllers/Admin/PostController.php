<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }
        
        $users = Auth::check() ? Auth::user()->name : null;
        $posts = Post::with('categoryPost')->get();
        return view('Admin.post.index', compact('posts', 'users'));
    }
    public function create()
    {
        $users = Auth::check() ? Auth::user()->name : null;
        $categories = CategoryPost::all();
        return view('Admin.post.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'keywords' => 'required|string',
            'slug' => 'required|string|unique:post,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'id_category_post' => 'nullable|exists:category_post,id',
        ]);


        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = $imageName;
        }

        $categoryId = $validated['id_category_post'] ?? null;

        Post::create([
            'title' => $validated['title'],
            'keywords' => $validated['keywords'],
            'slug' => $validated['slug'],
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'content' => $validated['content'],
            'id_category_post' => $categoryId,
        ]);

        return redirect()->route('index-post')->with('success', 'Bài viết đã được thêm thành công!');
    }


    public function Active($id)
    {
        $posts = Post::findOrFail($id);
        $posts->checkactive = !$posts->checkactive;
        $posts->save();
        return redirect()->route('index-post')->with('success', 'Trạng thái đã được cập nhật thành công.');
    }

}
