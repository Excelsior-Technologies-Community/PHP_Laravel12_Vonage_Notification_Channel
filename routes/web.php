<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Registration
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

/*
|--------------------------------------------------------------------------
| OTP Verification
|--------------------------------------------------------------------------
*/

Route::get('/verify-otp/{user}', [AuthController::class, 'showOtpForm'])
    ->name('otp.form');

Route::post('/verify-otp/{user}', [AuthController::class, 'verifyOtp'])
    ->name('otp.verify');

Route::post('/resend-otp/{user}', [AuthController::class, 'resendOtp'])
    ->name('otp.resend');

/*
|--------------------------------------------------------------------------
| SMS Logs
|--------------------------------------------------------------------------
*/

Route::get('/sms-logs', [AuthController::class, 'smsLogs'])
    ->name('sms.logs');