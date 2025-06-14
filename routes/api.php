<?php

use App\Http\Controllers\Admin\ReportController;

Route::post('/reports', [ReportController::class, 'reports']);
