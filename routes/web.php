<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage-login-user', function () {
    return view('homepage-login-user');
});

Route::get('/login-admin', function () {
    return view('login-admin');
});

Route::get('/login-user', function () {
    return view('login-user');
});

Route::get('/signup-user', function () {
    return view('signup-user');
});

Route::get('/signup-successful-user', function () {
    return view('signup-successful-user');
});

Route::get('/homepage-admin', function () {
    return view('homepage-admin');
});

Route::get('/signup-admin', function () {
    return view('signup-admin');
});

Route::get('/signup-successful-admin', function () {
    return view('signup-successful-admin');
});

Route::get('/dashboard-admin', function () {
    return view('dashboard-admin');
});

Route::get('/book-management-admin', function () {
    return view('book-management-admin');
});

Route::get('/category-management-admin', function () {
    return view('category-management-admin');
});

Route::get('/reader-management-admin', function () {
    return view('reader-management-admin');
});