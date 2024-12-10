<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = ['title', 'keywords', 'slug', 'image', 'description', 'content', 'id_category_post'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function categoryPost()
    {
        return $this->belongsTo(CategoryPost::class, 'id'); 
    }
    public static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            if (empty($post->slug)) {
                $post->slug = \Str::slug($post->title);
            }
        });
    }
}
