<?php

use Illuminate\Support\Facades\Route;
 use App\Models\Product;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ProductController;

Route::get('/', function() {
    $products = Product::with('category')->get();
    return view('welcome', compact('products'));
});
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);

Route::get('/welcome', [ProductController::class, 'frontpage']);