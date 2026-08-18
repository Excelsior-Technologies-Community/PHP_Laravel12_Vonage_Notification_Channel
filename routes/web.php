<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SmsLogController;

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

Route::prefix('sms-logs')->name('sms.')->group(function () {

    Route::get('/', [SmsLogController::class, 'index'])
        ->name('index');

    Route::get('/{smsLog}', [SmsLogController::class, 'show'])
        ->name('show');

    Route::post('/{smsLog}/retry', [SmsLogController::class, 'retry'])
        ->name('retry');

    Route::delete('/{smsLog}', [SmsLogController::class, 'destroy'])
        ->name('destroy');
});
