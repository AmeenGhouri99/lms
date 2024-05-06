<?php

use App\Http\Controllers\UserAcademicInformationController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserChooseProgramController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDocumentController;
use App\Http\Controllers\UserPersonalInformationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('user/auth/login');
});

Route::get('/signup', function () {
    return view('user/auth/signup');
});
Route::post('/signup', [UserAuthController::class, 'store'])->name('register');



Route::get('/welcome', function () {
    return view('user/welcome');
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

    Route::resource('personal-information', UserPersonalInformationController::class);
    Route::resource('academic-information', UserAcademicInformationController::class);
    Route::resource('choose-program-to-apply', UserChooseProgramController::class);
    Route::resource('documents', UserDocumentController::class);
});
