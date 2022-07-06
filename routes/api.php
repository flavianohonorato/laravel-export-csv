<?php

use App\Http\Controllers\Api\CsvController;
use App\Http\Middleware\ForceJsonMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('send-data-to-job', [CsvController::class, 'sendDataToJob'])
    ->middleware(ForceJsonMiddleware::class);
