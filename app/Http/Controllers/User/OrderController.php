<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Lấy thông tin người dùng
        $user = Auth::user();

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!$user) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        // Lặp qua các sản phẩm trong giỏ hàng
        foreach ($request->items as $item) {
            // Lấy sản phẩm từ cơ sở dữ liệu theo ID sản phẩm
            $product = Product::find($item['product_id']);

            if ($product) {
                // Kiểm tra số lượng sản phẩm trong kho
                if ($product->amount >= $item['amount']) {
                    // Tạo đơn hàng mới
                    Order::create([
                        'id_user' => $user->id,
                        'id_cart' => $item['id_cart'],
                        'name' => $product->name, // Lưu tên sản phẩm
                        'discount' => $product->discount, // Lưu giảm giá sản phẩm
                        'price' => $product->price, // Lưu giá sản phẩm
                        'total_price' => $product->price * $item['amount'], // Tính tổng tiền
                        'amount' => $item['amount'],
                    ]);

                    // Giảm số lượng sản phẩm trong kho sau khi đặt hàng
                    $product->decrement('amount', $item['amount']); // Giảm số lượng sản phẩm trong kho
                } else {
                    // Nếu sản phẩm không đủ số lượng trong kho
                    return redirect()->route('index-cart')->with('error', 'Sản phẩm ' . $product->name . ' không đủ số lượng trong kho!');
                }
            } else {
                // Nếu không tìm thấy sản phẩm
                return redirect()->route('index-cart')->with('error', 'Sản phẩm không tồn tại!');
            }
        }

        // Sau khi tạo đơn hàng thành công, xóa tất cả sản phẩm trong giỏ hàng của người dùng
        Cart::where('id_user', $user->id)->delete();

        // Quay lại trang giỏ hàng với thông báo thành công
        return redirect()->route('index-cart')->with('success', 'Đặt hàng thành công!');
    }

}

