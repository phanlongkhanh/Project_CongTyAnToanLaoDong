<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductTypeController extends Controller
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

        $producttypes = ProductType::all();
        return view('Admin.producttype.index', compact('users', 'producttypes'));
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

        return view('Admin.producttype.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $productType = new ProductType();
        $productType->name = $request->input('name');
        $productType->description = $request->input('description');
        $productType->save();

        return redirect()->route('index-producttypes')->with('success', 'Loại sản phẩm đã được thêm thành công.');
    }

    public function destroy($id)
    {
        $producttypes = ProductType::findOrFail($id);

        $producttypes->delete();

        return redirect()->route('index-producttypes')->with('success', 'Loại sản phẩm đã được xóa thành công.');
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
            return redirect()->route('index-producttypes')->with('error', 'Không tìm thấy bài viết với ID này.');
        }
        $producttypes = ProductType::find($id);

        $users = Auth::check() ? Auth::user()->name : null;
        if (!$producttypes) {
            return redirect()->route('index-producttypes')->with('error', 'Không tìm thấy bài viết với ID này.');
        }

        return view('Admin.producttype.update', compact('users', 'producttypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $producttypes = ProductType::findOrFail($id);

        if ($producttypes != $id) {
            return redirect()->route('index-producttypes')->with('error', 'Danh Mục Đã Bị Xóa');

        }

        $producttypes->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('index-producttypes')->with('success', 'Danh mục đã được cập nhật thành công!');
    }


}
