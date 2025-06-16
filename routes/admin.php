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
Route::post('/admin/products/create', [ProductController::class, 'create']);
Route::get('/admin/products/delete/{id}', [ProductController::class, 'deleteById']);
Route::get('/admin/orders', [OrderController::class, 'index']);
Route::get('/admin/users', [UserController::class, 'index']);
Route::get('/admin/reports', [ReportController::class, 'index']);

// Category Routes
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::post('/admin/category/update/{id}', [CategoryController::class, 'updateById'])->name('admin.category.update');
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'deleteById'])->name('admin.category.delete');