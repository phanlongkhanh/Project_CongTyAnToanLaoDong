<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.product.index', compact('users'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.product.create', compact('users'));
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
            'discount' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'amount' => 'required|integer',
            'price' => 'required|integer',
            'id_category' => 'required|exists:categories,id',
            'id_producttype' => 'required|exists:producttypes,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images/products', 'public');

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
        }
    }
}