<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $testing = 123;
    return view('welcome');
});
