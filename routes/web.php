<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CategoryPostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\PostNewController;
use App\Http\Controllers\User\PostCeremonyController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\Admin\CategoryProductController;




Route::get('/admin-login', [LoginController::class, 'index']);
Route::get('/', [HomepageController::class, 'index']);



Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('index-login');
    Route::get('/store', [LoginController::class, 'login'])->name('store-login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('trangchu')->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('index-homepage');
});

Route::prefix('sanpham')->group(function () {
    Route::get('/', [UserProductController::class, 'index'])->name('index-product-user');
});


Route::prefix('gioithieu')->group(function () {
    Route::get('/', [HomepageController::class, 'indexIntroduce'])->name('index-introduce');
});

Route::prefix('tuyendung')->group(function () {
    Route::get('/', [HomepageController::class, 'indexRecruitment'])->name('index-recruitment');
});


Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index-dashboard');
});


Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index-product');
    Route::get('/create', [ProductController::class, 'create'])->name('create-product');
    Route::get('/update', [ProductController::class, 'update'])->name('update-product');
    Route::post('/add', [ProductController::class, 'store'])->name('store-product');
});

Route::prefix('post')->group(function () {
    Route::get('/', action: [PostController::class, 'index'])->name('index-post');
    Route::get('/create', action: [PostController::class, 'create'])->name('create-post');
    Route::post('/add', [PostController::class, 'store'])->name('store-post');
    Route::get('active/{id}', [PostController::class, 'Active'])->name('active-post');
    Route::get('/{id}', [PostController::class, 'edit'])->name('edit-post');
    Route::put('/{id}', [PostController::class, 'update'])->name('update-post');
Route::delete('/{id}', [PostController::class, 'destroy'])->name('destroy-post');
});

Route::prefix('tintuc')->group(function () {
    Route::get('/', action: [PostNewController::class, 'index'])->name('index-post-news');
    Route::get('/{slug}', [PostNewController::class, 'view'])->name('view-post-news');

});

Route::prefix('khaigiang')->group(function () {
    Route::get('/', action: [PostCeremonyController::class, 'index'])->name('index-post-ceremony');
    Route::get('/{slug}', [PostCeremonyController::class, 'view'])->name('view-post-ceremony');

});


Route::prefix('category-post')->group(function () {
    Route::get('/', [CategoryPostController::class, 'index'])->name('index-category-post');
    Route::get('/create', [CategoryPostController::class, 'create'])->name('create-category-post');
    Route::post('/add', action: [CategoryPostController::class, 'store'])->name('store-category-post');
    Route::delete('/{id}', [CategoryPostController::class, 'destroy'])->name('destroy-category-post');
    Route::get('/{id}', [CategoryPostController::class, 'edit'])->name('edit-category-post');
    Route::put('/{id}', [CategoryPostController::class, 'update'])->name('update-category-post');
});


Route::prefix('category-product')->group(function () {
    Route::get('/', [CategoryProductController::class, 'index'])->name('index-category-product');
    Route::get('/create', action:[CategoryProductController::class, 'create'])->name('create-category-product');
    Route::post('/add', action: [CategoryProductController::class, 'store'])->name('store-category-product');
    Route::delete('/{id}', [CategoryProductController::class, 'destroy'])->name('destroy-category-product');
    Route::get('/{id}', [CategoryProductController::class, 'edit'])->name('edit-category-product');
    Route::put('/{id}', [CategoryProductController::class, 'update'])->name('update-category-product');
});


