<?php

use App\Http\Controllers\FeeChalanController;
use App\Http\Controllers\UserAcademicInformationController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserChooseProgramController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDocumentController;
use App\Http\Controllers\UserPersonalInformationController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Services\ChooseProgramService;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('user/auth/login');
});

Route::get('/signup', function () {
    return view('user/auth/signup');
});
Route::get('/logout', function () {
    Auth::logout();
    return view('user.auth.login');
});
Route::post('/signup', [UserAuthController::class, 'store'])->name('register');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');



Route::get('/welcome', function () {
    return view('user/welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'user'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('home', [UserController::class, 'index'])->name('home');
    Route::resource('personal-information', UserPersonalInformationController::class);
    Route::resource('academic-information', UserAcademicInformationController::class);
    Route::resource('choose-program-to-apply', UserChooseProgramController::class);
    Route::resource('documents', UserDocumentController::class);
    Route::resource('pay-admission-fee', FeeChalanController::class);
    Route::get('review-application/{id}', [UserController::class, 'reviewAdmissionApplication'])->name('review-application');
    Route::post('review-application', [UserController::class, 'reviewAdmissionApplication'])->name('review-application.store');
    Route::post('is_undertaking_accept', [UserController::class, 'updateIsUndertakingAccept'])->name('is-undertaking-accept.store');
});
