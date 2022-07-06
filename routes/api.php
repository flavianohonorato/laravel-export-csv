<?php

use App\Http\Controllers\Api\CsvController;
use Illuminate\Support\Facades\Route;

Route::post('send-data-to-job', [CsvController::class, 'sendDataToJob']);
