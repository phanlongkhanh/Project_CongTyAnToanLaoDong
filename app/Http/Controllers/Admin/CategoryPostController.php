<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CategoryPostController extends Controller
{
    public function index()
    {
        $users = Auth::check() ? Auth::user()->name : null;
        $category_posts = CategoryPost::all();
        return view('Admin.category.post.index', compact('category_posts', 'users'));
    }

    public function create()
    {
        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.category.post.create', compact('users'));
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

    public function destroy($id)
    {
        try {
            $category_post = CategoryPost::findOrFail($id);
            $category_post->delete();

            return redirect()->route('index-category-post')->with('success', 'Danh mục đã được xóa thành công!');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('index-category-post')->with('error', 'Đơn vị vận chuyển không tồn tại.');
        }
    }

}
