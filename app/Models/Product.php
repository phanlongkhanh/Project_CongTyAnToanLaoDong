<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'discount',
        'description',
        'image',
        'amount',
        'price',
        'id_category',
        'id_producttype',
        'checkactive',
        'list_image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    // Mối quan hệ nhiều sản phẩm thuộc về một loại sản phẩm
    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'id_producttype');
    }

    public function images()
    {
        return $this->hasMany(ListImage::class, 'id_product');
    }

    public function listImages()
    {
        return $this->hasMany(ListImage::class, 'id_product', 'id');
    }

    // Mối quan hệ ngược lại với giỏ hàng
    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_product');
    }

}
