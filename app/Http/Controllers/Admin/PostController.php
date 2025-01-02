<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PostController extends Controller
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
        $posts = Post::with('categoryPost')->get();
        return view('Admin.post.index', compact('posts', 'users'));
    }
    public function create()
    {
        $user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

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
            'description' => 'nullable|string|max:200',
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

    public function edit($encryptedId)
    {
        $user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('index-post')->with('error', 'Không tìm thấy bài viết với ID này.');
        }

        $post = Post::find($id);

        $categories_posts = CategoryPost::all();
        
        $users = Auth::check() ? Auth::user()->name : null;
        if (!$post) {
            return redirect()->route('index-post')->with('error', 'Không tìm thấy bài viết với ID này.');
        }

        return view('Admin.post.update', compact('post', 'users', 'categories_posts'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'keywords' => 'required|string',
            'slug' => 'required|string|unique:post,slug,' . $id, 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:200',
            'content' => 'required|string',
            'id_category_post' => 'nullable|exists:category_post,id',
        ]);

        $post = Post::findOrFail($id);

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            if ($imagePath && file_exists(public_path('images/' . $imagePath))) {
                unlink(public_path('images/' . $imagePath));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = $imageName;
        }

        $post->update([
            'title' => $validated['title'],
            'keywords' => $validated['keywords'],
            'slug' => $validated['slug'],
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'content' => $validated['content'],
            'id_category_post' => $validated['id_category_post'] ?? null,
        ]);

        return redirect()->route('index-post')->with('success', 'Bài viết đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id); 

        if ($post->image && file_exists(public_path('images/' . $post->image))) {
            unlink(public_path('images/' . $post->image));
        }

        $post->delete();

        return redirect()->route('index-post')->with('success', 'Bài viết đã được xóa thành công!');
    }


    public function Active($id)
    {
        $posts = Post::findOrFail($id);
        $posts->checkactive = !$posts->checkactive;
        $posts->save();
        return redirect()->route('index-post')->with('success', 'Trạng thái đã được cập nhật thành công.');
    }

}
