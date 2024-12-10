<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost;

class CategoryPostController extends Controller
{
    public function index()
    {
        $category_posts = CategoryPost::all();
        return view('Admin.category.post.index',compact('category_posts'));
    }

    public function create()
    {
        return view('Admin.category.post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        CategoryPost::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('index-category-post')->with('success', 'Danh mục đã được tạo thành công!');
    }
}
