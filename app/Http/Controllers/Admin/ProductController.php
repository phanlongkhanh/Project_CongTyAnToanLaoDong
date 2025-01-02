<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ListImage;
use App\Models\ProductType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function index()
    {$user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $products = Product::orderBy('created_at', 'desc')->get();

        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.product.index', compact('users', 'products'));
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

        $categories = Category::all();
        $producttypes = ProductType::all();
        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.product.create', compact('users', 'categories', 'producttypes'));
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
            return redirect()->route('index-product')->with('error', 'ID sản phẩm không hợp lệ.');
        }

        $products = Product::find($id);

        if (!$products) {
            return redirect()->route('index-product')->with('error', 'Không tìm thấy sản phẩm với ID này.');
        }

        $categories = Category::all();
        $producttypes = ProductType::all();
        $users = Auth::check() ? Auth::user()->name : null;

        return view('Admin.product.update', compact('users', 'products', 'categories', 'producttypes'));
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            ListImage::where('id_product', $id)->delete();

            if ($product->image && $product->image !== 'products/default_image.jpg') {
                $imagePath = public_path('images/products/' . $product->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $product->delete();

            return redirect()->route('index-product')->with('success', 'Sản phẩm đã được xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Đã xảy ra lỗi khi xóa sản phẩm: ' . $e->getMessage());
        }
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|regex:/\S/',
            'discount' => 'required|integer|min:0|max:100',
            'description' => 'nullable|string|regex:/\S/',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'list_image' => 'nullable|array',
            'list_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'amount' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'id_category' => 'required|exists:categories,id',
            'id_producttype' => 'required|exists:producttypes,id',
        ]);

        try {
            // Xử lý ảnh đại diện
            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/products'), $imageName);
                $imagePath = 'products/' . $imageName;
            } else {
                $imagePath = 'products/default_image.jpg'; // Ảnh mặc định nếu không có ảnh đại diện
            }

            // Tạo sản phẩm mới
            $product = Product::create([
                'name' => $validated['name'],
                'discount' => $validated['discount'],
                'description' => $validated['description'] ?? null,
                'image' => $imagePath, // Lưu ảnh đại diện
                'amount' => $validated['amount'],
                'price' => $validated['price'],
                'id_category' => $validated['id_category'],
                'id_producttype' => $validated['id_producttype'],
            ]);

            // Xử lý ảnh phụ (list_image)
            if ($request->hasFile('list_image')) {
                $imagePaths = [];
                foreach ($request->file('list_image') as $image) {
                    $imageName = time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/products'), $imageName);
                    $imagePaths[] = 'products/' . $imageName;
                }

                // Lưu danh sách hình ảnh phụ vào bảng list_images
                foreach ($imagePaths as $path) {
                    ListImage::create([
                        'id_product' => $product->id,
                        'image_path' => $path,
                    ]);
                }
            }

            return redirect()->route('index-product')->with('success', 'Sản phẩm đã được thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Đã xảy ra lỗi khi thêm sản phẩm: ' . $e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|regex:/\S/',
            'discount' => 'required|integer|min:0|max:100',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'list_image' => 'nullable|array',
            'list_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'amount' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'id_category' => 'required|exists:categories,id',
            'id_producttype' => 'required|exists:producttypes,id',
        ]);

        try {
            // Tìm sản phẩm cần cập nhật
            $product = Product::findOrFail($id);

            // Xử lý ảnh đại diện (nếu có thay đổi)
            $imagePath = $product->image; // Giữ nguyên ảnh cũ nếu không có ảnh mới
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ nếu có
                if (file_exists(public_path('images/products/' . $product->image))) {
                    unlink(public_path('images/products/' . $product->image));
                }
                // Xử lý ảnh mới
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/products'), $imageName);
                $imagePath = 'products/' . $imageName;
            }

            // Cập nhật thông tin sản phẩm
            $product->update([
                'name' => $validated['name'],
                'discount' => $validated['discount'],
                'description' => $validated['description'] ?? null,
                'image' => $imagePath, // Cập nhật ảnh đại diện
                'amount' => $validated['amount'],
                'price' => $validated['price'],
                'id_category' => $validated['id_category'],
                'id_producttype' => $validated['id_producttype'],
            ]);

            // Xử lý ảnh phụ (list_image)
            if ($request->hasFile('list_image')) {
                // Xóa tất cả ảnh phụ cũ trước khi thêm ảnh mới
                ListImage::where('id_product', $product->id)->delete();

                $imagePaths = [];
                foreach ($request->file('list_image') as $image) {
                    $imageName = time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/products'), $imageName);
                    $imagePaths[] = 'products/' . $imageName;
                }

                // Lưu danh sách hình ảnh phụ vào bảng list_images
                foreach ($imagePaths as $path) {
                    ListImage::create([
                        'id_product' => $product->id,
                        'image_path' => $path,
                    ]);
                }
            }

            return redirect()->route('index-product')->with('success', 'Sản phẩm đã được cập nhật thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Đã xảy ra lỗi khi cập nhật sản phẩm: ' . $e->getMessage());
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