<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


// Routes Pages
Route::get('/', [PageController::class, 'index']);


// Routes Products
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'detail'])->where('id', '[0-9]+');
// Route::get('/product/search', [ProductController::class, 'search']);
Route::get('/cart', [ProductController::class, 'index']);
// Route::get('/product', [ProductController::class, 'index']);


// Routes Auth
Route::get('/login', function () {
    return view('auth.login');
});




// Route ... Dũng

