<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/homepage-login-user', function () {
    return view('user.homepage-login-user');
});

Route::get('admin/login-admin', function () {
    return view('admin.login-admin');
});

Route::get('user/login-user', function () {
    return view('user.login-user');
});

Route::get('user/signup-user', function () {
    return view('user.signup-user');
});

Route::get('user/signup-successful-user', function () {
    return view('user/signup-successful-user');
});

Route::get('admin/homepage-admin', function () {
    return view('admin.homepage-admin');
});

Route::get('admin/signup-admin', function () {
    return view('admin.signup-admin');
});

Route::get('admin/signup-successful-admin', function () {
    return view('admin.signup-successful-admin');
});

Route::get('admin/dashboard-admin', function () {
    return view('admin.dashboard-admin');
});

Route::get('admin/book-management-admin', function () {
    return view('admin.book-management-admin');
});

Route::get('admin/category-management-admin', function () {
    return view('admin.category-management-admin');
});

Route::get('admin/reader-management-admin', function () {
    return view('admin.reader-management-admin');
});

Route::get('admin/borrow-return-management-admin', function () {
    return view('admin.borrow-return-management-admin');
});

Route::get('admin/finemoney-management-admin', function () {
    return view('admin.finemoney-management-admin');
});

Route::get('user/homepage-user', function () {
    return view('user.homepage-user');
});

Route::get('user/info-user', function () {
    return view('user.info-user');
});

Route::get('user/setting-user', function () {
    return view('user.setting-user');
});

Route::get('user/help-user', function () {
    return view('user.help-user');
});

Route::get('user/search-book-user', function () {
    return view('user.search-book-user');
});

Route::prefix('user')->group(function () {
    Route::view('/trangphat', 'user.trangphat')->name('user.trangphat');
    Route::view('/content-trangphat', 'user.content-trangphat');
    Route::view('/content-trangphat-thanhtoan', 'user.content-trangphat-thanhtoan');
});
