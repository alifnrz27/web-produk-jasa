<?php

use App\Http\Controllers\Blog\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('products',[ProductController::class]);

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

Route::get('/about', function () {
    return view('about');
})->name('about');