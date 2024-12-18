<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     protected $fillable = ['name', 'discount', 'description', 'amount', 'price', 'id_category'];

     public function category()
     {
         return $this->belongsTo(CategoryProduct::class, 'id_category');
     }

     
}
