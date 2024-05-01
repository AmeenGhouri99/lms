<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('user/login');
});

Route::get('/signup', function () {
    return view('user/signup');
});



Route::get('/welcome', function () {
    return view('user/welcome');
});

Route::group(['prefix' => 'user'], function () {

    Route::get('academic', function () {
        return view('user/academic/index');
    })->name('user.academic.index');

    Route::get('personal-information', [UserController::class, 'create'])->name('user.personal_information.create');
});