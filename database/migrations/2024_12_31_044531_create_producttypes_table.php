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
        Schema::create('producttypes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Tên Loại Sản Phẩm');
            $table->text('description')->comment('Mô tả');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producttypes');
    }
};
