<?php

use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\GenerateQRController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('health-check', [HealthCheckController::class, '__invoke'])->name('health.check');

Route::post('generate-qr', [GenerateQRController::class, '__invoke'])->name('generate.qr');
