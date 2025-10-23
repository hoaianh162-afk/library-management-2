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