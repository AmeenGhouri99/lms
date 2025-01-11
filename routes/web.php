<?php

use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AppliedProgramController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MeritListController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\FeeChalanController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserAcademicInformationController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserChooseProgramController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDocumentController;
use App\Http\Controllers\UserPersonalInformationController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [UserAuthController::class, 'loginUpPage'])->name('home.page');

Route::get('admin-login', function () {
    return view('user/auth/login');
})->name('admin-login');

Route::get('signup', [UserAuthController::class, 'signUpPage']);
Route::get('login', [UserAuthController::class, 'loginUpPage'])->name('login.page');
Route::get('/logout', function () {
    Auth::logout();
    return view('user.auth.login');
})->name('logout');
Route::post('/signup', [UserAuthController::class, 'store'])->name('register');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');



Route::get('/welcome', function () {
    return view('user/welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'user'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('home', [UserController::class, 'index'])->name('home');
    Route::get('states', [UserPersonalInformationController::class, 'getStates'])->name('state');
    Route::get('domicile', [UserPersonalInformationController::class, 'getDomicileCity'])->name('domicile');
    Route::resource('personal-information', UserPersonalInformationController::class);
    Route::resource('academic-information', UserAcademicInformationController::class);
    Route::resource('choose-program-to-apply', UserChooseProgramController::class);
    Route::resource('documents', UserDocumentController::class);
    Route::resource('pay-admission-fee', FeeChalanController::class);
    Route::get('review-application/{id}', [UserController::class, 'reviewAdmissionApplication'])->name('review-application');
    Route::post('review-application', [UserController::class, 'reviewAdmissionApplication'])->name('review-application.store');
    Route::post('is_undertaking_accept', [UserController::class, 'updateIsUndertakingAccept'])->name('is-undertaking-accept.store');
    Route::get('generate-pdf/{id}', [PdfController::class, 'generatePDF'])->name('generate-pdf');
});
Route::group(['middleware' => ['auth:sanctum', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('users', AdminUserController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('admissions', AdmissionController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('applied_programs', AppliedProgramController::class);
    Route::get('merit-list/create', [MeritListController::class, 'create'])->name('merit-list.create');
    Route::post('merit-list/generate', [MeritListController::class, 'generateMeritList'])->name('merit-list.generate');


    Route::get('profile/setting', [HomeController::class, 'profileSetting'])->name('profile.setting');
});
