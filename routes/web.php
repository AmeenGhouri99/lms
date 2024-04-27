<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('user/login');
});

Route::get('/signup', function () {
    return view('user/signup');
});

Route::get('/academic', function () {
    return view('user/academic');
});

Route::get('/welcome', function () {
    return view('user/welcome');
});

Route::get('/student', function () {
    return view('user/student');
});
