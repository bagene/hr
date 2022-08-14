<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::middleware('can:schedule.create')->group(function () {
  Route::get('/create', [ScheduleController::class, 'create'])
    ->name('create');
});