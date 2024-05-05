<?php

use App\Http\Controllers\UserAcademicInformationController;
use App\Http\Controllers\UserChooseProgramController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDocumentController;
use App\Http\Controllers\UserPersonalInformationController;

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

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

    Route::resource('personal-information', UserPersonalInformationController::class);
    Route::resource('academic-information', UserAcademicInformationController::class);
    Route::resource('choose-program-to-apply', UserChooseProgramController::class);
    Route::resource('documents', UserDocumentController::class);
});
