<?php

use App\Http\Controllers\AuthTokenController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthTokenController::class, 'store']);

Route::middleware('auth:sanctum')->apiResource('books', BookController::class);
