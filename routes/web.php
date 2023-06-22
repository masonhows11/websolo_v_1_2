<?php

use App\Http\Controllers\Auth\EmailVerifyPromptController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;
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
Route::get('/login/form', [LoginController::class, 'loginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');//->middleware(['throttle:3,1']);
Route::get('/register/form', [RegisterController::class, 'registerForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/emailVerifyPrompt', [EmailVerifyPromptController::class, 'verifyEmailPrompt'])->name('email.verify.prompt');
Route::post('/resendVerifyEmail', [VerifyEmailController::class, 'resendEmailVerify'])->name('resend.verify.email');
Route::get('/emailVerify/{id}/{code}', [VerifyEmailController::class, 'verifyEmail'])->name('email.verify');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
