<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryProductController extends Controller
{
    public function index(){

        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $categories = Category::all();

        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.category.product.index',compact('users','categories'));
    }

    public function create(){
        
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.category.product.create',compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',  
            'description' => 'nullable|string',
        ]);

        $category = Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('index-category-product')->with('success', 'Danh mục đã được tạo thành công!');
    }

    public function destroy($id)
    {
        try {
            $categories = Category::findOrFail($id);
            $categories->delete();

            return redirect()->route('index-category-product')->with('success', 'Danh mục đã được xóa thành công!');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('index-category-product')->with('error', 'Đơn vị vận chuyển không tồn tại.');
        }
    }
}
