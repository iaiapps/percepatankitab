<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SettingController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // guest
    Route::post('upload', [PaymentController::class, 'store'])->name('upload');

    // Admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('payment', PaymentController::class);
        // aktifkan user
        Route::post('activate/{id}', [PaymentController::class, 'activate'])->name('activate');
        Route::resource('setting', SettingController::class);
        Route::resource('course', CourseController::class);
    });
});
