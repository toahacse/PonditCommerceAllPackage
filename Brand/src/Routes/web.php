<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\Brand\Http\Controllers\BrandController;

Route::resource('/brands', BrandController::class);

Route::get('/brands/trashed/id', [BrandController::class, 'trashed'])->name('brands.trashed');
Route::post('/brands/trashed/destroy/{id}', [BrandController::class, 'trashed_destroy'])->name('brands.trashed.destroy');
Route::get('/brands/trashed/restore/{id}', [BrandController::class, 'trashed_restore'])->name('brands.trashed.restore');