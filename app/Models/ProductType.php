<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'producttypes';
    protected $fillable = [
        'name', 'description'
    ];

    // Mối quan hệ một loại sản phẩm có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class, 'id_producttype');
    }
}
