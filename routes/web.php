<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

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
        Route::get('/add', [CompanyController::class, 'add'])->name('show-company-add');
        Route::post('/add', [CompanyController::class, 'store'])->name('company-add');
        Route::get('/edit/{id?}', [CompanyController::class, 'edit'])->name('show-company-edit');
        Route::post('/{id?}', [CompanyController::class, 'update'])->name('company-update');
        Route::delete('/delete/{id?}', [CompanyController::class, 'delete'])->name('company-delete');
    });
});

Route::group(['prefix' => 'admin'], function () {
    //Authentication
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('show-admin-login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin-login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin-logout');
});

Route::get('/optimize', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect('/');
})->name('optimize');