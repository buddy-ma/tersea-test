<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\InvitationController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Auth\EmployeLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register' => false]);
Route::redirect('/', '/admin/dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:web']], function () {
    Route::get('/dashboard', [StatisticsController::class, 'Dashboard'])->name('dashboard');

    //admins
    Route::prefix('admins')->group(function () {
        Route::get('/', [UserController::class, 'User'])->name('user-list');
        Route::get('/add', [UserController::class, 'ShowAddUser'])->name('show-user-add');
        Route::post('/add', [UserController::class, 'UserAdd'])->name('user-add');
    });

    Route::prefix('companies')->group(function () {
        Route::get('/', [CompanyController::class, 'list'])->name('company-list');
        Route::get('/show/{id?}', [CompanyController::class, 'show'])->name('show-company');
        Route::get('/add', [CompanyController::class, 'add'])->name('show-company-add');
        Route::post('/add', [CompanyController::class, 'store'])->name('company-add');
        Route::get('/edit/{id?}', [CompanyController::class, 'edit'])->name('show-company-edit');
        Route::post('/{id?}', [CompanyController::class, 'update'])->name('company-update');
        Route::delete('/delete/{id?}', [CompanyController::class, 'delete'])->name('company-delete');
    });

    Route::prefix('invitations')->group(function () {
        Route::get('/', [InvitationController::class, 'list'])->name('invitation-list');
        Route::post('/add', [InvitationController::class, 'store'])->name('invitation-add');
        Route::get('/close/{id?}', [InvitationController::class, 'close'])->name('invitation-close');
        Route::get('/open/{id?}', [InvitationController::class, 'open'])->name('invitation-open');
    });


    Route::get('/historique', [StatisticsController::class, 'historique'])->name('historique');


    // Route::prefix('employes')->group(function () {
    //     Route::post('/{id?}', [InvitationController::class, 'update'])->name('employe-update');
    //     Route::delete('/delete/{id?}', [InvitationController::class, 'delete'])->name('employe-delete');
    // });
});

Route::group(['prefix' => 'admin'], function () {
    //Authentication
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('show-admin-login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin-login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin-logout');
});

//Employes
Route::group(['prefix' => 'employe'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/invitation/{id?}', [HomeController::class, 'invitation'])->name('invitation');
    Route::post('/invitation/{id?}', [HomeController::class, 'invitationRegister'])->name('invitation-register');

    Route::get('/login', [EmployeLoginController::class, 'showLoginForm'])->name('show-employe-login');
    Route::post('/login', [EmployeLoginController::class, 'login'])->name('employe-login');
    Route::post('/logout', [EmployeLoginController::class, 'logout'])->name('employe-logout');
});

Route::group(['prefix' => 'employe', 'middleware' => ['auth:employe']], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::post('/profile', [HomeController::class, 'profileUpdate'])->name('profile-update');
    Route::get('/company', [HomeController::class, 'company'])->name('company');
});

Route::get('/optimize', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect('/');
})->name('optimize');
