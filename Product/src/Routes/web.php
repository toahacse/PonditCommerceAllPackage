<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\Product\Http\Controllers\ProductController;

Route::resource('/products', ProductController::class);


Route::get('/products/trashed/id', [ProductController::class, 'trashed'])->name('products.trashed');
Route::post('/products/trashed/destroy/{id}', [ProductController::class, 'trashed_destroy'])->name('products.trashed.destroy');
Route::get('/products/trashed/restore/{id}', [ProductController::class, 'trashed_restore'])->name('products.trashed.restore');
