<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');