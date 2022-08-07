<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::middleware('can:employee.index')->group(function () {
  Route::get('/', [EmployeeController::class, 'index'])
    ->name('index');

  Route::get('/{employee}', [EmployeeController::class, 'show'])
    ->name('show');
});