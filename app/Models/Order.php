<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_cart',
        'name',
        'discount',
        'price',
        'total_price',
        'active',
        'status',
        'amount',
    ];


    // Mối quan hệ: Một đơn hàng thuộc về một giỏ hàng
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart');
    }
    // Mô hình Cart
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // Giả sử có cột 'product_id' trong bảng carts
    }

 
    // Mối quan hệ: Một đơn hàng thuộc về một người dùng
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
