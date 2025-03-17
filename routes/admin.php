<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
