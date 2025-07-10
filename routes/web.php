<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SoldController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\EbookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\TrackvideoController;
use App\Models\Referral;

// ini route di landing
Route::get('/', [LandingController::class, 'index'])->name('landing');

// register
Route::get('formbuy', [LandingController::class, 'formbuy'])->name('formbuy');
Route::get('formreseller', [LandingController::class, 'formreseller'])->name('formreseller');
Route::get('formaffiliator', [LandingController::class, 'formaffiliator'])->name('formaffiliator');

// ini route quizz
Route::get('quizzdata', [LandingController::class, 'quizzdata'])->name('quizzdata');
Route::post('quizzdatastore', [LandingController::class, 'quizzdatastore'])->name('quizzdatastore');
Route::get('quizz={str}', [LandingController::class, 'quizz'])->name('quizz');
Route::post('quizzstore', [LandingController::class, 'quizzstore'])->name('quizzstore');
Route::get('quizzscore={str}', [LandingController::class, 'quizzscore'])->name('quizzscore');

// custom login
Route::post('/tokenlogin', [LoginController::class, 'tokenlogin'])->name('tokenlogin');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // home
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // guest routes after login
    Route::post('upload', [PaymentController::class, 'store'])->name('upload');

    // profile
    Route::get('profile', [UserController::class, 'profile'])->name('profile');

    // Admin routes
    Route::middleware(['role:admin'])->group(function () {
        // user
        Route::resource('user', UserController::class);
        // payment
        Route::resource('payment', PaymentController::class);
        Route::get('paymentimg/{paymentimg}', [PaymentController::class, 'showimg'])->name('paymentimg');
        Route::get('downloadDoc/{payment}', [PaymentController::class, 'downloadDoc'])->name('downloadDoc');
        // aktifkan user yang sudah membayar
        Route::post('activate/{id}', [PaymentController::class, 'activate'])->name('activate');
        // course
        Route::resource('course', CourseController::class);
        // ebook
        Route::resource('ebook', EbookController::class);
        Route::get('/ebook/{ebook}/view', [EbookController::class, 'view'])->name('ebook.view');
        // referral
        Route::get('reseller', [ReferralController::class, 'reseller'])->name('reseller');
        Route::get('affiliator', [ReferralController::class, 'affiliator'])->name('affiliator');
        Route::resource('referral', ReferralController::class)->except('index', 'create');
        Route::post('activatereferral/{id}', [ReferralController::class, 'activatereferral'])->name('activatereferral');
        // komisi
        Route::resource('commission', CommissionController::class);
        Route::post('pay/{id}', [CommissionController::class, 'commissionPay'])->name('commissions.pay');
        // pembayaran massal
        Route::get('rekap', [CommissionController::class, 'rekap'])->name('commissions.rekap');
        Route::post('payweekly', [CommissionController::class, 'commissionPayWeekly'])->name('commissions.payWeekly');
        // tracking
        Route::resource('tracking', TrackvideoController::class);
        Route::get('manualrun', [TrackvideoController::class, 'manualRun'])->name('manualrun');
        Route::get('laporan', [TrackvideoController::class, 'pengirimanVideo'])->name('laporan');
        // setting
        Route::resource('setting', SettingController::class);
        Route::resource('settinglanding', LandingController::class)->except('index');
        Route::get('settinglanding', [LandingController::class, 'settingLanding'])->name('settinglanding');
        // Route::get('settinglandingedit/{id}', [LandingController::class, 'settingLandingEdit'])->name('settinglanding.edit');
        // Route::put('settinglandingupdate/{landing}', [LandingController::class, 'settingLandingUpdate'])->name('settinglanding.update');
    });

    // User (pemberli) routes
    Route::middleware(['role:user'])->group(function () {
        // status aktif user
        Route::post('user-status/{id}', [UserController::class, 'status'])->name('status');

        // kelas
        Route::get('usercourse', [CourseController::class, 'usercourse'])->name('usercourse');
        Route::get('usercourseshow/{id}', [CourseController::class, 'usercourseshow'])->name('usercourseshow');
        // ebook
        Route::get('userebook', [EbookController::class, 'userebook'])->name('userebook');
        Route::get('userebookshow/{id}', [EbookController::class, 'userebookshow'])->name('userebookshow');
    });

    // Reseller routes
    Route::middleware(['role:reseller'])->group(function () {
        Route::get('soldbyreseller', [SoldController::class, 'soldByReferral'])->name('soldbyreseller');
        Route::get('commissionbyreseller', [SoldController::class, 'commissionByreferral'])->name('commissionbyreseller');
        Route::get('databankres', [ReferralController::class, 'databank'])->name('databankres');
        Route::post('databankres/{referral}', [ReferralController::class, 'storedatabank'])->name('storedatabankres');
    });
    // Affiliator routes
    Route::middleware(['role:affiliator'])->group(function () {
        Route::get('soldbyaffiliator', [SoldController::class, 'soldByReferral'])->name('soldbyaffiliator');
        Route::get('commissionbyaffiliator', [SoldController::class, 'commissionByreferral'])->name('commissionbyaffiliator');
        Route::get('databankaff', [ReferralController::class, 'databank'])->name('databankaff');
        Route::post('databankaff/{referral}', [ReferralController::class, 'storedatabank'])->name('storedatabankaff');
    });
});
