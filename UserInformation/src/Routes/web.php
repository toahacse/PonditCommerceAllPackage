<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\UserInformation\Http\Controllers\UserInformationController;

Route::resource('/user-informations', UserInformationController::class);

Route::get('/user-informations/trashed/id', [UserInformationController::class, 'trashed'])->name('user-informations.trashed');
Route::post('/user-informations/trashed/destroy/{id}', [UserInformationController::class, 'trashed_destroy'])->name('user-informations.trashed.destroy');
Route::get('/user-informations/trashed/restore/{id}', [UserInformationController::class, 'trashed_restore'])->name('user-informations.trashed.restore');