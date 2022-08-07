<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;

Route::middleware('can:organization.create')->group(function () {
    Route::get('/create', [OrganizationController::class, 'create'])
        ->name('create');
    Route::post('/create', [OrganizationController::class, 'store'])
        ->name('store');
});

Route::middleware('can:organization.index')->group(function () {
    Route::get('/', [OrganizationController::class, 'index'])->name('index');
    Route::get('/{org}', [OrganizationController::class, 'show'])->name('show');
});

Route::middleware('can:organization.edit')->group(function () {
    Route::get('/organizations/{org}/edit', [OrganizationController::class, 'edit'])
        ->name('edit');
    Route::put('/organizations/{org}', [OrganizationController::class, 'update'])
        ->name('update');
});
        
Route::middleware('can:employee.create')->group(function () {
    Route::get('/organizations/{org}/account', [OrganizationController::class, 'create_account'])
        ->name('account.create');
    Route::post('/organizations/{org}/account', [OrganizationController::class, 'store_account'])
        ->name('account.store');
});
        
        