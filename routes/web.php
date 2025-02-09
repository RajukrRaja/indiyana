<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;






Route::get('/', [HomeController::class, 'home']);



Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login_user', [AuthController::class, 'login_user'])->name('login_user');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('verify/{token}', [AuthController::class, 'verify'])->name('verify');

Route::post('create_user', [AuthController::class, 'create_user'])->name('create_user');

Route::get('forgot', [AuthController::class, 'forgot'])->name('forgot');

