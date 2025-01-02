<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;



class CategoryPostController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $users = Auth::check() ? Auth::user()->name : null;
        $category_posts = CategoryPost::all();
        return view('Admin.category.post.index', compact('category_posts', 'users'));
    }

    public function create()
    {
        $user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.category.post.create', compact('users'));
    }

    public function edit($encryptedId)
    {

        $user = auth()->user();
        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('index-category-post')->with('error', 'Không tìm thấy bài viết với ID này.');
        }

        $category_posts = CategoryPost::find($id);

        $users = Auth::check() ? Auth::user()->name : null;
        if (!$category_posts) {
            return redirect()->route('index-category-post')->with('error', 'Không tìm thấy bài viết với ID này.');
        }

        return view('Admin.category.post.update', compact('users', 'category_posts'));
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


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $categoryPost = CategoryPost::findOrFail($id);

        $categoryPost->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('index-category-post')->with('success', 'Danh mục đã được cập nhật thành công!');
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
