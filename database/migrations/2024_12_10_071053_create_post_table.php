<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Tiêu Đề');
            $table->string('keywords')->comment('Từ Khóa SEO'); 
            $table->string('slug')->comment('Đường dẫn');
            $table->string('image')->nullable()->comment('Hình ảnh');
            $table->text('description')->comment('Mô tả'); 
            $table->longText('content')->comment('Nội dung');
            $table->boolean('checkactive')->default(true)->comment('Check hoạt động');
            $table->unsignedBigInteger('id_category_post')->comment('ID Danh Mục Bài Viết');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
