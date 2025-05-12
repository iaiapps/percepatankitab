<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // Admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('user', UserController::class);


        // Tambahkan route admin lainnya di sini
    });
});
