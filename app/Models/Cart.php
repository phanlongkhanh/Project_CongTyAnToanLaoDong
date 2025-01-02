<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_product',
        'amount',
    ];

    // Mối quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
