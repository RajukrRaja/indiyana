<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MobileVerificationController;


use App\Http\Controllers\PaymentController;



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
    Route::get('panel/dashboard/make_payment', [TransactionController::class, 'make_payment'])
    ->name('make_payment');
    Route::get('panel/dashboard/Register_account', [AuthController::class, 'Register_account'])
    ->name('Register_account');

    Route::get('panel/dashboard/payments/transactions', [PaymentController::class, 'transactions'])
    ->name('transactions');




    
Route::get('/panel/user_admin_view', [UserController::class, 'user_admin_view'])->name('user_admin_view');
Route::post('panel/users/add_user_admin', [UserController::class, 'add_user_admin'])->name('add_user_admin');
Route::put('panel/users/edit_user_admin', [UserController::class, 'edit_user_admin'])->name('edit_user_admin');
Route::delete('/panel/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
Route::put('/panel/users/edit_user_admin', [UserController::class, 'updateUser'])->name('users.update');




Route::get('panel/pages/Navbar_page', [MenuController::class, 'Navbar_page'])->name('Navbar_page');
Route::get('panel/pages/About_page', [AboutUsController::class, 'About_page'])->name('About_page');
Route::get('edit_about/{id}', [AboutUsController::class, 'edit_about'])->name('edit_about');
Route::put('update_about/{id}', [AboutUsController::class, 'update_about'])->name('update_about');

Route::get('panel/pages/Contact_page', [PageController::class, 'Contact_page'])->name('Contact_page');
Route::get('panel/pages/Service_page', [PageController::class, 'Service_page'])->name('Service_page');




Route::get('/verify-mobile', [MobileVerificationController::class, 'showVerificationForm'])->name('mobile.verify');

Route::post('/send-otp', [MobileVerificationController::class, 'sendOtp'])->name('mobile.send.otp');
Route::post('/verify-otp', [MobileVerificationController::class, 'verifyOtp'])->name('mobile.verify.otp');

});





Route::get('/dashboard', function () { return view('backend.dashboard'); })->name('dashboard');
Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::post('/payment/confirm', [PaymentController::class, 'confirmPayment'])->name('payment.confirm');

Route::get('viewSecurity', [PaymentController::class, 'viewSecurity'])->name('viewSecurity');



Route::post('/verify/security', [PaymentController::class, 'verifySecurity'])->name('verify.security');

Route::get('about_page_view', [AboutUsController::class, 'about_page_view'])->name('about_page_view');
Route::get('Navbar_page', [PageController::class, 'Navbar_page'])->name('Navbar_page');
Route::get('Navbar_page_view', [PageController::class, 'Navbar_page_view'])->name('Navbar_page_view');
Route::get('add_menu_view', [MenuController::class, 'add_menu_view'])->name('add_menu_view');
Route::post('add_menu', [PageController::class, 'add_menu'])->name('add_menu');
Route::get('Contact_page', [PageController::class, 'Contact_page'])->name('Contact_page');
Route::get('Service_page', [PageController::class, 'Service_page'])->name('Service_page');

Route::get('/locations', [PaymentController::class, 'getLocations']);



Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');
Route::post('/menus/update/{id}', [MenuController::class, 'update'])->name('menus.update');
Route::post('/menus/delete/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');

Route::post('/submenus/store', [SubmenuController::class, 'store'])->name('submenus.store');
Route::post('/submenus/update/{id}', [SubmenuController::class, 'update'])->name('submenus.update');
Route::post('/submenus/delete/{id}', [SubmenuController::class, 'destroy'])->name('submenus.destroy');

Route::get('panel/pages/Home_page', [HomePageController::class, 'Home_page'])->name('Home_page');







