<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminHomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.home');
