<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;


// Routes Pages
Route::get('/', [PageController::class, 'index']);
Route::get('/search', [PageController::class, 'search']);


// Routes Products
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'detail'])->where('id', '[0-9]+');
Route::get('/cart', [ProductController::class, 'index']);

// Routes Orders
Route::get('/order/confirm', [OrderController::class, 'confirmFromCart']);
Route::post('/order/confirm/{id}', [OrderController::class, 'confirm']);
Route::post('/order/process-payment', [OrderController::class, 'processPayment']);
Route::get('/order/history', [OrderController::class, 'history']);
Route::get('/order/return-vnpay', [OrderController::class, 'returnVnpay']);

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
// Profile, Password of User 
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/profilechange', [UserController::class, 'profilechange'])->name('profilechange');
Route::post('/profilechange', [UserController::class, 'profileUpdate'])->name('profileUpdate');
Route::get('/passchange', [UserController::class, 'passChange'])->name('passChange');
Route::post('/passchange', [UserController::class, 'passUpdate'])->name('passUpdate');