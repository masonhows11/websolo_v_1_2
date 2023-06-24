<?php


use App\Http\Controllers\Auth\ResendEmailVerifyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;

use App\Http\Livewire\Front\About;
use App\Http\Livewire\Front\ContactSingle;
use App\Http\Livewire\Front\Dashboard\Dashboard;

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


Route::get('/about-us',About::class)->name('about');
Route::get('/contact-us',ContactSingle::class)->name('contact');

Route::middleware(['web','auth_front','verifyUser'])->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});




Route::middleware(['web', 'auth_front', 'verifyUser'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

});
