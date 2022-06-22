<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\Cart\Http\Controllers\CartController;

Route::resource('/carts', CartController::class);

Route::get('/carts/trashed/id', [CartController::class, 'trashed'])->name('carts.trashed');
Route::post('/carts/trashed/destroy/{id}', [CartController::class, 'trashed_destroy'])->name('carts.trashed.destroy');
Route::get('/carts/trashed/restore/{id}', [CartController::class, 'trashed_restore'])->name('carts.trashed.restore');