<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\Order\Http\Controllers\OrderController;

Route::resource('/orders', OrderController::class);

Route::get('/orders/trashed/id', [OrderController::class, 'trashed'])->name('orders.trashed');
Route::post('/orders/trashed/destroy/{id}', [OrderController::class, 'trashed_destroy'])->name('orders.trashed.destroy');
Route::get('/orders/trashed/restore/{id}', [OrderController::class, 'trashed_restore'])->name('orders.trashed.restore');