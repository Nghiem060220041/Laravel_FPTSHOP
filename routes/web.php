<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route cho Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route cho Trang Danh mục sản phẩm
// Ví dụ: /category/dien-thoai
Route::get('/category/{slug}', [ProductController::class, 'category'])->name('products.category');

// Route cho Trang Chi tiết sản phẩm
// Ví dụ: /product/iphone-15-pro-max
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('products.show');