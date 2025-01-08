<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('id_user', Auth::id())->paginate(5);

        $count_carts = Cart::where('id_user', Auth::id())->count();

        $users = Auth::user();

        return view('User.cart.index', compact('carts', 'count_carts', 'users'));
    }
    //hàm thêm vào giỏ hàng
    public function addToCart(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.'], 401);
        }

        $request->validate([
            'id_product' => 'required|exists:products,id',
            'amount' => 'required|integer|min:1',
        ]);

        $userId = auth()->id();
        $amount = $request->input('amount', 1);

        $cartItem = Cart::where('id_user', $userId)
            ->where('id_product', $request->id_product)
            ->first();

        if ($cartItem) {
            $cartItem->amount += $amount;
            $cartItem->save();
        } else {
            Cart::create([
                'id_user' => $userId,
                'id_product' => $request->id_product,
                'amount' => $amount,
            ]);
        }

        return response()->json(['success' => 'Sản phẩm đã được thêm vào giỏ hàng.']);
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem && $cartItem->id_user == auth()->id()) {
            $cartItem->delete();
            return response()->json(['success' => 'Sản phẩm đã được xóa khỏi giỏ hàng.']);
        }

        return response()->json(['error' => 'Không tìm thấy sản phẩm trong giỏ hàng.'], 404);
    }
}
