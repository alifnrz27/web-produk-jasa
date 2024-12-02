<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);
Route::get('/about', function () {
    return view('about');
})->name('about');