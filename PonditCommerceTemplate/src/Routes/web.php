<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('ponditcommercetemplate::admin.pages.home.index');
});

Route::get('/admin/banner', function () {
    return view('ponditcommercetemplate::admin.pages.banner.index');
});

Route::get('/admin/banner/create', function () {
    return view('ponditcommercetemplate::admin.pages.banner.create');
});

Route::get('/admin/banner/show', function () {
    return view('ponditcommercetemplate::admin.pages.banner.show');
});

Route::get('/admin/category', function () {
    return view('ponditcommercetemplate::admin.pages.category.index');
});

Route::get('/admin/category/create', function () {
    return view('ponditcommercetemplate::admin.pages.category.create');
});

Route::get('/admin/product', function () {
    return view('ponditcommercetemplate::admin.pages.product.index');
});

Route::get('/admin/product/create', function () {
    return view('ponditcommercetemplate::admin.pages.product.create');
});

Route::get('/admin/product/show', function () {
    return view('ponditcommercetemplate::admin.pages.product.show');
});