<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\Label\Http\Controllers\LabelController;

Route::resource('/labels', LabelController::class);

Route::get('/labels/trashed/id', [LabelController::class, 'trashed'])->name('labels.trashed');
Route::post('/labels/trashed/destroy/{id}', [LabelController::class, 'trashed_destroy'])->name('labels.trashed.destroy');
Route::get('/labels/trashed/restore/{id}', [LabelController::class, 'trashed_restore'])->name('labels.trashed.restore');