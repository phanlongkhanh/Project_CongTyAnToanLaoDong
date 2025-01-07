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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Tên Sản Phẩm');
            $table->unsignedBigInteger(column: 'discount')->comment('Giảm giá');
            $table->text('description')->nullable()->comment('Mô tả');  
            $table->string('image')->nullable()->comment('Hình ảnh');
            $table->unsignedBigInteger(column: 'amount')->comment('Số lượng');
            $table->unsignedBigInteger(column: 'price')->comment('Giá tiền');
            $table->boolean('checkactive')->default(true)->comment('Check hoạt động');
            $table->unsignedBigInteger('id_category')->comment('Danh mục sản phẩm');
            $table->unsignedBigInteger('id_producttype')->comment('Loại Sản Phẩm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
