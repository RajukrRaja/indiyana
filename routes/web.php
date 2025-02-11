<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\PageController;
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
Route::put('panel/users/edit_user_admin', [UserController::class, 'edit_user_admin'])->name('edit_user_admin');




Route::get('panel/pages/Navbar_page', [PageController::class, 'Navbar_page'])->name('Navbar_page');
Route::get('panel/pages/About_page', [AboutUsController::class, 'About_page'])->name('About_page');
Route::get('edit_about/{id}', [AboutUsController::class, 'edit_about'])->name('edit_about');
Route::put('update_about/{id}', [AboutUsController::class, 'update_about'])->name('update_about');

Route::get('panel/pages/Contact_page', [PageController::class, 'Contact_page'])->name('Contact_page');
Route::get('panel/pages/Service_page', [PageController::class, 'Service_page'])->name('Service_page');





});

Route::get('about_page_view', [AboutUsController::class, 'about_page_view'])->name('about_page_view');
Route::get('Navbar_page', [PageController::class, 'Navbar_page'])->name('Navbar_page');
Route::get('Contact_page', [PageController::class, 'Contact_page'])->name('Contact_page');
Route::get('Service_page', [PageController::class, 'Service_page'])->name('Service_page');


