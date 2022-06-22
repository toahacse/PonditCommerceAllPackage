<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\Tag\Http\Controllers\TagController;

Route::resource('/tags', TagController::class);

Route::get('/tags/trashed/id', [TagController::class, 'trashed'])->name('tags.trashed');
Route::post('/tags/trashed/destroy/{id}', [TagController::class, 'trashed_destroy'])->name('tags.trashed.destroy');
Route::get('/tags/trashed/restore/{id}', [TagController::class, 'trashed_restore'])->name('tags.trashed.restore');