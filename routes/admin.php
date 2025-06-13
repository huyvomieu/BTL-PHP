<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;

// Routes Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/category', [CategoryController::class, 'index']);
Route::get('/admin/products', [ProductController::class, 'index']);
Route::get('/admin/orders', [OrderController::class, 'index']);
Route::get('/admin/users', [UserController::class, 'index']);
Route::get('/admin/reports', [ReportController::class, 'index']);