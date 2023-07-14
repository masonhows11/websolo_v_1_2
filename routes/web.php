<?php



use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPermAssignController;
use App\Http\Controllers\Admin\AdminRoleAssignController;
use App\Http\Controllers\Admin\AdminSampleController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Auth\AdminValidateController;


use App\Http\Controllers\Auth\ResendEmailVerifyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Front\Article\ArticleController;
use App\Http\Controllers\Front\CustomersController;
use App\Http\Controllers\Front\ServicesController;
use App\Http\Controllers\HomeController;

use App\Http\Livewire\Admin\AdminAdmins;
use App\Http\Livewire\Admin\AdminArticleComment;
use App\Http\Livewire\Admin\AdminBackEnd;
use App\Http\Livewire\Admin\AdminCategory;
use App\Http\Livewire\Admin\AdminEmail;
use App\Http\Livewire\Admin\AdminFrontEnd;
use App\Http\Livewire\Admin\AdminPerms;
use App\Http\Livewire\Admin\AdminProfile;
use App\Http\Livewire\Admin\AdminRoles;
use App\Http\Livewire\Admin\AdminSampleComment;
use App\Http\Livewire\Admin\AdminSettings;
use App\Http\Livewire\Admin\AdminTag;
use App\Http\Livewire\Admin\AdminUsers;
use App\Http\Livewire\Admin\ArticleListComment;
use App\Http\Livewire\Admin\ListUsersForPerm;
use App\Http\Livewire\Admin\ListUsersForRole;
use App\Http\Livewire\Admin\SampleListComment;

use App\Http\Livewire\Front\Articles\ArticleComponent;
use App\Http\Livewire\Front\Samples\SampleComponent;
use App\Http\Livewire\Front\SingleAbout;
use App\Http\Livewire\Front\SingleContact;
use App\Http\Livewire\Front\Dashboard\Dashboard;


use App\Http\Livewire\Front\Samples\SamplesComponent;


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


Route::get('/about-us',SingleAbout::class)->name('about');
Route::get('/contact-us',SingleContact::class)->name('contact');

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


//// front routes

Route::middleware(['web'])->group(function(){

    Route::get('/samples',SamplesComponent::class)->name('samples');
    Route::get('/sample/{sample}',SampleComponent::class)->name('sample');

});


Route::middleware(['web'])->group(function(){

    Route::get('/articles',[ArticleController::class,'index'])->name('articles');
    Route::get('/articles/{category}',[ArticleController::class,'articleCategory'])->name('article.category');
    Route::get('/article/{article}',ArticleComponent::class)->name('article');

});

Route::middleware(['web'])->group(function(){

    Route::get('/services',[ServicesController::class,'index'])->name('services');


});

Route::middleware(['web'])->group(function(){

    Route::get('/customers',[CustomersController::class,'index'])->name('customers');


});



//// admin routes

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'loginAdminForm'])->name('admin.login.form');
    Route::post('/login', [AdminAuthController::class, 'loginAdmin'])->name('admin.login');

    Route::get('/validate-email', [AdminValidateController::class, 'validateEmailForm'])->name('admin.validate.email.form');
    Route::post('/validate-email', [AdminValidateController::class, 'validateEmail'])->name('admin.validate.email');

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


// backEnd


Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function () {

    Route::get('/back-end/index', AdminBackEnd::class)->name('back-ends');

});



// frontEnd



Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function () {

    Route::get('/front-end/index', AdminFrontEnd::class)->name('front-ends');

});

// crud categories


Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function (){

    Route::get('/categories', AdminCategory::class)->name('categories');

});


// crud tags


Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function (){

    Route::get('/tags', AdminTag::class)->name('tags');

});



// crud sample


Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function (){

    Route::get('/sample-index', [AdminSampleController::class, 'index'])->name('sample.index');
    Route::get('/sample-create', [AdminSampleController::class, 'create'])->name('sample.create');
    Route::post('/sample-store', [AdminSampleController::class, 'store'])->name('sample.store');
    Route::get('/sample-edit/{id}', [AdminSampleController::class, 'edit'])->name('sample.edit');
    Route::post('/sample-update', [AdminSampleController::class, 'update'])->name('sample.update');

});


// crud article

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function (){

    Route::get('/article-index', [AdminArticleController::class, 'index'])->name('article.index');
    Route::get('/article-create', [AdminArticleController::class, 'create'])->name('article.create');
    Route::post('/article-store', [AdminArticleController::class, 'store'])->name('article.store');
    Route::get('/article-edit/{id}', [AdminArticleController::class, 'edit'])->name('article.edit');
    Route::post('/article-update', [AdminArticleController::class, 'update'])->name('article.update');

});



// management comments

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function (){

    Route::get('/comment/articles-index', AdminArticleComment::class)->name('comment.articles.index');
    Route::get('/comments/article', ArticleListComment::class)->name('article.comments');

    Route::get('/comment/samples-index', AdminSampleComment::class)->name('comment.samples.index');
    Route::get('/comments/sample', SampleListComment::class)->name('sample.comments');

});

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth_front:admin', 'verify_admin', 'role:admin|admin'])->group(function (){

    Route::get('/setting-index',AdminSettings::class)->name('setting.index');


});
