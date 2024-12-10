<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CategoryPostController;




Route::get('/admin-login', [LoginController::class, 'index']);
Route::get('/', [HomepageController::class, 'index']);

Route::prefix('homepage')->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('index-homepage');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index-dashboard');
});


Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index-product');
    Route::get('/create', [ProductController::class, 'create'])->name('create-product');
    Route::get('/update', [ProductController::class, 'update'])->name('update-product');
});

Route::prefix('post')->group(function () {
    Route::get('/', action: [PostController::class, 'index'])->name('index-post');
    Route::get('/create', action: [PostController::class, 'create'])->name('create-post');
    Route::post('/add', [PostController::class, 'store'])->name('store-post');
});


Route::prefix('category-post')->group(function () {
    Route::get('/', [CategoryPostController::class, 'index'])->name('index-category-post');
    Route::get('/create', [CategoryPostController::class, 'create'])->name('create-category-post');
    Route::post('/add', [CategoryPostController::class, 'store'])->name('store-category-post');
});
