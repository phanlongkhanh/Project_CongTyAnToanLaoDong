<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductType;

class ProductController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }
        $products = Product::orderBy('created_at', 'desc')->get();
        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.product.index', compact('users', 'products'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $categories = Category::all();
        $producttypes = ProductType::all();
        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.product.create', compact('users', 'categories', 'producttypes'));
    }
    public function update()
    {
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.product.update', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'discount' => 'required|integer|min:0|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'amount' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'id_category' => 'required|exists:categories,id',
            'id_producttype' => 'required|exists:producttypes,id',
        ]);

        try {
            $imagePath = null;

            if ($request->hasFile('image')) {
                if ($imagePath && file_exists(public_path('images/' . $imagePath))) {
                    unlink(public_path('images/' . $imagePath));
                }

                // Xử lý và lưu ảnh mới
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/products'), $imageName);
                $imagePath = 'products/' . $imageName;  // Lưu đường dẫn ảnh
            }

            // Tạo sản phẩm mới
            Product::create([
                'name' => $validated['name'],
                'discount' => $validated['discount'],
                'description' => $validated['description'] ?? null,
                'image' => $imagePath,
                'amount' => $validated['amount'],
                'price' => $validated['price'],
                'id_category' => $validated['id_category'],
                'id_producttype' => $validated['id_producttype'],
            ]);

            return redirect()->route('index-product')->with('success', 'Sản phẩm đã được thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Đã xảy ra lỗi khi thêm sản phẩm: ' . $e->getMessage());
        }
    }


    public function Active($id)
    {
        $products = Product::findOrFail($id);
        $products->checkactive = !$products->checkactive;
        $products->save();
        return redirect()->route('index-product')->with('success', 'Trạng thái đã được cập nhật thành công.');
    }
}