<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\Category\Http\Controllers\CategoryController;

Route::resource('/categories', CategoryController::class);

Route::get('/categories/trashed/id', [CategoryController::class, 'trashed'])->name('categories.trashed');
Route::post('/categories/trashed/destroy/{id}', [CategoryController::class, 'trashed_destroy'])->name('categories.trashed.destroy');
Route::get('/categories/trashed/restore/{id}', [CategoryController::class, 'trashed_restore'])->name('categories.trashed.restore');