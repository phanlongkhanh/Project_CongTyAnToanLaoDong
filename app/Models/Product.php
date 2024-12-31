<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'discount', 'description', 'image', 'amount', 'price', 'id_category', 'id_producttype','checkactive'
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

     
}
