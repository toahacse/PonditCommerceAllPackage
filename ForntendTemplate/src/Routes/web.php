<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('forntendtemplate::pages.home.index');
});