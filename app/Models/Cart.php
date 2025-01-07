<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'id_user',
        'amount',
    ];

    // Mối quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    // Mối quan hệ: Một giỏ hàng thuộc về một người dùng
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Mối quan hệ: Một giỏ hàng có thể được liên kết với nhiều đơn hàng
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_cart');
    }

}
