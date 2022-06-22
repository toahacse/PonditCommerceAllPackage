<?php

use Illuminate\Support\Facades\Route;

use Pondit\PonditCommerce\Testimonial\Http\Controllers\TestimonialController;

Route::resource('/testimonials', TestimonialController::class);

Route::get('/testimonials/trashed/id', [TestimonialController::class, 'trashed'])->name('testimonials.trashed');
Route::post('/testimonials/trashed/destroy/{id}', [TestimonialController::class, 'trashed_destroy'])->name('testimonials.trashed.destroy');
Route::get('/testimonials/trashed/restore/{id}', [TestimonialController::class, 'trashed_restore'])->name('testimonials.trashed.restore');