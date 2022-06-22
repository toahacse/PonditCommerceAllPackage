<?php

use Comment\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function() {

    Route::resource('comments', CommentController::class);

});

