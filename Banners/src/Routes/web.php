<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\Banners\Http\Controllers\BannerController;

Route::resource('/banners', BannerController::class);

Route::get('/banners/trashed/id', [BannerController::class, 'trashed'])->name('banners.trashed');
Route::post('/banners/trashed/destroy/{id}', [BannerController::class, 'trashed_destroy'])->name('banners.trashed.destroy');
Route::get('/banners/trashed/restore/{id}', [BannerController::class, 'trashed_restore'])->name('banners.trashed.restore');