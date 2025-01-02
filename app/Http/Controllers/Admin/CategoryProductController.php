<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Contracts\Encryption\DecryptException;

class CategoryProductController extends Controller
{
    public function index(){

        $user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $categories = Category::all();

        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.category.product.index',compact('users','categories'));
    }

    public function create(){
        
        $user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }
        
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
    public function edit($encryptedId)
    {

        $user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        try {
            // Giải mã ID
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('index-category-product')->with('error', 'Không tìm thấy danh mục với ID này.');
        }

        // Tìm kiếm danh mục với ID giải mã
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('index-category-product')->with('error', 'Danh mục không tồn tại.');
        }

        $users = Auth::check() ? Auth::user()->name : null;

        // Trả về view để chỉnh sửa danh mục
        return view('Admin.category.product.update', compact('category', 'users'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
    ]);

    $category_product = Category::findOrFail($id);

    $category_product->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    return redirect()->route('index-category-product')->with('success', 'Danh mục đã được cập nhật thành công!');
}

}
