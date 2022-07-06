<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\ForceJsonMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('users', [UserController::class, 'index'])
    ->name('users.index')
    ->middleware(ForceJsonMiddleware::class);

Route::post('users/store', [UserController::class, 'store'])
    ->name('users.store')
    ->middleware(ForceJsonMiddleware::class);
