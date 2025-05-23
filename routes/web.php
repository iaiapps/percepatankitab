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
Route::get('quizz', [LandingController::class, 'quizz'])->name('quizz');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // guest
    Route::post('upload', [PaymentController::class, 'store'])->name('upload');

    // Admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('payment', PaymentController::class);
        // aktifkan user yang sudah membayar
        Route::post('activate/{id}', [PaymentController::class, 'activate'])->name('activate');
        Route::resource('setting', SettingController::class);
        Route::resource('course', CourseController::class);
    });
    Route::middleware(['role:user'])->group(function () {
        // status aktif user
        Route::post('user-status/{id}', [UserController::class, 'status'])->name('status');

        // kelas
        Route::get('usercourse', [CourseController::class, 'usercourse'])->name('usercourse');
        Route::post('kode', [CourseController::class, 'kode'])->name('kode');
    });
});
