<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;



Route::get('/', [HomepageController::class, 'index']);

Route::prefix('homepage')->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('index-homepage');
});

Route::prefix('db-admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index-dashboard');
});


Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index-product');
    Route::get('/create', [ProductController::class, 'create'])->name('create-product');
    Route::get('/update', [ProductController::class, 'update'])->name('update-product');
});

Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index-post');
});
