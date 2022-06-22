<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\ProductTag\Http\Controllers\ProductTagController;

Route::resource('/product-tags', ProductTagController::class);

Route::get('/product-tags/trashed/id', [ProductTagController::class, 'trashed'])->name('product-tags.trashed');
Route::post('/product-tags/trashed/destroy/{id}', [ProductTagController::class, 'trashed_destroy'])->name('product-tags.trashed.destroy');
Route::get('/product-tags/trashed/restore/{id}', [ProductTagController::class, 'trashed_restore'])->name('product-tags.trashed.restore');