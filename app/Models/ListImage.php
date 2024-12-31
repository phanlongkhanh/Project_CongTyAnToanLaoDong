<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListImage extends Model
{
    use HasFactory;

    protected $table = 'list_images';

    protected $fillable = [
        'id_product',
        'image_path',
    ];

  
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
