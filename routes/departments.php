<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::middleware('can:department.create')->group(function () {
    Route::get('/create', [DepartmentController::class, 'create'])
        ->name('create');

    Route::post('/create', [DepartmentController::class, 'store'])
        ->name('store');
});

Route::middleware('can:department.index')->group(function () {
    Route::get('/', [DepartmentController::class, 'index'])
        ->name('index');

    Route::get('/{department}', [DepartmentController::class, 'show'])
        ->name('show');
});

Route::middleware('can:department.edit')->group(function () {
    Route::get('/{department}/edit', [DepartmentController::class, 'edit'])
        ->name('edit');

    Route::put('/{department}', [DepartmentController::class, 'update'])
        ->name('update');

    Route::get('/{department}/employees', [DepartmentController::class, 'addEmployee'])
        ->name('employee.add');

    Route::put('/{department}/employees', [DepartmentController::class, 'storeEmployee'])
        ->name('employee.store');
});