<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;


// Routes Pages
Route::get('/', [PageController::class, 'index']);


// Routes Products
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'detail'])->where('id', '[0-9]+');
Route::get('/cart', [ProductController::class, 'index']);

// Routes Orders
Route::get('/order/confirm', [OrderController::class, 'confirmFromCart']);
Route::post('/order/confirm/{id}', [OrderController::class, 'confirm']);
// Route::get('/order/confirm/{id}', [OrderController::class, 'confirm']);

// Routes Cart
Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/add/{product_id}/{quantity}', [CartController::class, 'add']);
Route::get('/cart/update/{product_id}/{type}', [CartController::class, 'update']);


// Routes Auth
Route::get('/login', function () {
    return view('auth.login');
});




// Route ... Dũng
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');