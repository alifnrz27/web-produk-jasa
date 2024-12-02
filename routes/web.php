<?php

use App\Http\Controllers\Blog\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
