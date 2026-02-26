<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Default page → Register
Route::get('/', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);