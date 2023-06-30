<?php


use App\Http\Controllers\Admin\AdminAdminsController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPermAssignController;
use App\Http\Controllers\Admin\AdminRoleAssignController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Auth\AdminValidateController;


use App\Http\Controllers\Auth\ResendEmailVerifyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;

use App\Http\Livewire\Admin\AdminAdmins;
use App\Http\Livewire\Admin\AdminEmail;
use App\Http\Livewire\Admin\AdminPerms;
use App\Http\Livewire\Admin\AdminProfile;
use App\Http\Livewire\Admin\AdminRoles;
use App\Http\Livewire\Admin\AdminUsers;
use App\Http\Livewire\Admin\ListUsersForPerm;
use App\Http\Livewire\Admin\ListUsersForRole;
use App\Http\Livewire\Front\About;
use App\Http\Livewire\Front\ContactSingle;
use App\Http\Livewire\Front\Dashboard\Dashboard;

use App\Http\Livewire\Front\Dashboard\EditEmail;
use App\Http\Livewire\Front\Dashboard\EditPassword;
use App\Http\Livewire\Front\Dashboard\EditProfile;
use App\Http\Livewire\Front\Dashboard\DeleteAccount;


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

// for create storage link on real host
Route::get('/storage-link', function () {
    symlink(storage_path('app/public'), $_SERVER['DOCUMENT_ROOT'] . '/storage');
});

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



// profile

Route::middleware(['web', 'auth_front', 'verifyUser'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/edit-email', EditEmail::class)->name('edit.email');
    Route::get('/edit-password',EditPassword::class)->name('edit.password');
    Route::get('/edit-profile',EditProfile::class)->name('edit.profile');
    Route::get('/delete-account',DeleteAccount::class)->name('delete.account');

});


// admin routes

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'loginAdminForm'])->name('admin.login.form');
    Route::post('/login', [AdminAuthController::class, 'loginAdmin'])->name('admin.login');

    Route::get('/validate-email', [AdminValidateController::class, 'validateMobileForm'])->name('admin.validate.email.form');
    Route::post('/validate-email', [AdminValidateController::class, 'validateMobile'])->name('admin.validate.email');

    Route::post('/resend-email', [AdminValidateController::class, 'resendCode'])->name('admin.resend.email');
});



Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/logOut', [AdminAuthController::class, 'logOut'])->name('logout');

});

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function () {

    Route::get('/profile', AdminProfile::class)->name('profile');
    Route::get('/change/email', AdminEmail::class)->name('change.email');

});


Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function (){

    Route::get('/admins-list',AdminAdmins::class)->name('admins.list');
    Route::get('/user-list',AdminUsers::class)->name('users.list');

});

// crud roles & perms

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function (){
    Route::get('/roles', AdminRoles::class)->name('roles');
    Route::get('/perms', AdminPerms::class)->name('perms');
});

// assign roles

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function (){

    Route::get('/roles-list-users', ListUsersForRole::class)->name('role.list.users');
    Route::get('/roles-assign-form', [AdminRoleAssignController::class, 'create'])->name('roles.assign.form');
    Route::post('/roles-assign', [AdminRoleAssignController::class, 'store'])->name('roles.assign');

});

// assign perms

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function (){

    Route::get('/perms-list-users', ListUsersForPerm::class)->name('perm.list.users');
    Route::get('/perms-assign-form', [AdminPermAssignController::class, 'create'])->name('perms.assign.form');
    Route::post('/perms-assign', [AdminPermAssignController::class, 'store'])->name('perms.assign');

});

