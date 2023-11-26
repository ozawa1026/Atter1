<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'index']);
     });
