<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
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

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verify'])->middleware(['signed'])->name('verification.verify');

    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/organizations', [OrganizationController::class, 'index'])->name('organization.index');
    Route::get('/organizations/create', [OrganizationController::class, 'create'])->name('organization.create');
    Route::post('/organizations/create', [OrganizationController::class, 'store'])->name('organization.store');
    Route::get('/organizations/{org}', [OrganizationController::class, 'show'])->name('organization.show');
    Route::get('/organizations/{org}/edit', [OrganizationController::class, 'edit'])->name('organization.edit');
    Route::put('/organizations/{org}', [OrganizationController::class, 'update'])->name('organization.update');

    Route::get('/organizations/{org}/account', [OrganizationController::class, 'create_account'])->name('organization.account.create');
    Route::post('/organizations/{org}/account', [OrganizationController::class, 'store_account'])->name('organization.account.store');
});