<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ResendEmailVerifyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RemoveAccountController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDashboard\EditEmailController;
use App\Http\Controllers\UserDashboard\UserDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

// authentication & authorize
Route::get('/login', [LoginController::class, 'loginForm'])->name('login.form');
Route::post('/login-user', [LoginController::class, 'login'])->name('login');//->middleware(['throttle:3,1']);

Route::get('/register', [RegisterController::class, 'registerForm'])->name('register.form');
Route::post('/register-user', [RegisterController::class, 'register'])->name('register');

Route::get('/verify-email', [VerifyEmailController::class, 'verifyEmail'])->name('verify.email');
Route::post('/verify', [VerifyEmailController::class, 'verify'])->name('verify');

Route::get('/resend-email-prompt', [ResendEmailVerifyController::class, 'resendEmailPrompt'])->name('resend.email.prompt');
Route::post('/resend-email', [ResendEmailVerifyController::class, 'resendEmail'])->name('resend.email');


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware(['web', 'auth', 'verifyUser'])->group(function () {

    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/edit/profile', [UserDashboardController::class, 'editProfile'])->name('edit.profile');
    Route::post('/update/profile', [UserDashboardController::class, 'updateProfile'])->name('update.profile');

    Route::get('/edit/emails-form', [EditEmailController::class, 'editEmailForm'])->name('edit.emails.form');
    Route::post('/edit/emails', [EditEmailController::class, 'editEmail'])->name('edit.emails');
    Route::get('/verify/edit-emails/{$id}{$code}', [EditEmailController::class, 'verifyEditEmail'])->name('verify.edit.emails');

    Route::get('/change/password/form', [ChangePasswordController::class, 'create'])->name('change.password.form');
    Route::post('/change/password', [ChangePasswordController::class, 'store'])->name('change.password');
    Route::get('/delete/account', [RemoveAccountController::class, 'destroy'])->name('delete.account');
});
