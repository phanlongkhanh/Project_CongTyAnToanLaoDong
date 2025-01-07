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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->comment('Thông Tin Khách Hàng');
            $table->unsignedBigInteger('id_cart')->comment('Thông Tin Sản Phẩm');
            $table->string('name')->comment('tên sản phẩm');
            $table->unsignedBigInteger(column: 'discount')->comment('Giảm giá');
            $table->unsignedBigInteger('price')->comment('giá tiền');
            $table->unsignedBigInteger('total_price')->comment('Tổng Tiền');
            $table->boolean('active')->default(true)->comment('kiểm tra trang thái');
            $table->boolean('status')->default(true)->comment('xác nhận đơn hàng');
            $table->unsignedBigInteger('amount')->comment('số lượng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
