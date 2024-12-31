<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\CategoryPost;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;



class UserProductController extends Controller
{
    public function index()
    {
        $category_posts = CategoryPost::all();
        $categories = Category::all();
        $products = Product::all();
        $producttypes = ProductType::all();
        return view('User.product.index', compact('category_posts', 'products', 'categories', 'producttypes'));
    }

    public function detail($encryptedId)
    {

        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('index-product-user')->with('error', 'Không tìm thấy bài viết với ID này.');
        }

        $products = Product::findOrFail($id);

        $users = Auth::check() ? Auth::user()->name : null;

        if (!$products) {
            return redirect()->route('index-product-user')->with('error', 'Không tìm thấy bài viết với ID này.');
        }

        return view('User.product.detail', compact('products'));
    }



}
