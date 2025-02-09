<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;







Route::get('/', [HomeController::class, 'home']);



Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login_user', [AuthController::class, 'login_user'])->name('login_user');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('verify/{token}', [AuthController::class, 'verify'])->name('verify');

Route::post('create_user', [AuthController::class, 'create_user'])->name('create_user');

Route::get('forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::get('forgot', [AuthController::class, 'forgot'])->name('forgot');


Route::get('logout', [AuthController::class, 'logout'])->name('logout');






Route::middleware(['adminuser'])->group(function () {
    Route::get('panel/dashboard', [DashboardContoller::class, 'dashboard'])->name('dashboard');
    
Route::get('/panel/user_admin_view', [UserController::class, 'user_admin_view'])->name('user_admin_view');
Route::post('panel/users/add_user_admin', [UserController::class, 'add_user_admin'])->name('add_user_admin');
Route::put('panel/users/edit_user_admin', [UserController::class, 'edit_user_admin'])->name('edit_user_admin');
});

