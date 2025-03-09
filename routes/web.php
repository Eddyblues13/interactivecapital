<?php

use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('login.page');
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');



// Forgot Password routes
Route::get('/forgot-password', [App\Http\Controllers\Auth\AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\Auth\AuthController::class, 'sendResetLinkEmail'])->name('password.email');

// Password Reset routes
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\Auth\AuthController::class, 'reset'])->name('password.update');


Route::prefix('user')->middleware('user')->group(function () {
    Route::get('/home', [App\Http\Controllers\User\UserController::class, 'index'])->name('home');
    Route::get('/plans', [App\Http\Controllers\User\PlanController::class, 'index'])->name('plans');
    Route::post('/fund-trading', [App\Http\Controllers\User\PlanController::class, 'fundTrading'])->name('fund.trading');
    Route::get('/deposit', [App\Http\Controllers\User\DepositController::class, 'index'])->name('deposit.page');
    Route::get('fund/step-one', [App\Http\Controllers\User\DepositController::class, 'stepOne'])->name('deposit.one');
    Route::post('fund/step-one', [App\Http\Controllers\User\DepositController::class, 'stepOneSubmit'])->name('deposit.one.submit');
    Route::get('fund/step-two', [App\Http\Controllers\User\DepositController::class, 'stepTwo'])->name('deposit.two');
    Route::post('fund/step-two', [App\Http\Controllers\User\DepositController::class, 'stepTwoSubmit'])->name('deposit.two.submit');
    Route::get('fund/step-three', [App\Http\Controllers\User\DepositController::class, 'stepThree'])->name('deposit.three');
    Route::post('fund/step-three', [App\Http\Controllers\User\DepositController::class, 'stepThreeSubmit'])->name('deposit.three.submit');
    Route::get('fund/pay-crypto', [App\Http\Controllers\User\DepositController::class, 'payCrypto'])->name('pay.crypto');
});
