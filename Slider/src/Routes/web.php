<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\Slider\Http\Controllers\SliderController;

Route::resource('/sliders', SliderController::class);

Route::get('/sliders/trashed/id', [SliderController::class, 'trashed'])->name('sliders.trashed');
Route::post('/sliders/trashed/destroy/{id}', [SliderController::class, 'trashed_destroy'])->name('sliders.trashed.destroy');
Route::get('/sliders/trashed/restore/{id}', [SliderController::class, 'trashed_restore'])->name('sliders.trashed.restore');