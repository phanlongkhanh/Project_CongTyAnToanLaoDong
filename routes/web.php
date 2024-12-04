<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\HomepageController;


Route::prefix('homepage')->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('index-homepage');
});

