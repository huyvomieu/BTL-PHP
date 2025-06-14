<?php

use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ProductController;

Route::post('/reports', [ReportController::class, 'reports']);
Route::get('/products/{id}', [ProductController::class, 'getById']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);
