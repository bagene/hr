<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/password-reset', [AuthController::class, 'reset_password'])->middleware('guest')->name('password.reset');
Route::post('/password-reset', [AuthController::class, 'reset_password_post'])->name('password.reset.post');
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('organizations')
        ->as('organization.')
        ->group(fn () => require __DIR__.'/organizations.php');

    Route::prefix('departments')
        ->as('department.')
        ->group(fn () => require __DIR__.'/departments.php');

    Route::prefix('employees')
        ->as('employee.')
        ->group(fn () => require __DIR__.'/employees.php');
    
    Route::prefix('schedules')
        ->as('schedule.')
        ->group(fn () => require __DIR__.'/schedules.php');
});