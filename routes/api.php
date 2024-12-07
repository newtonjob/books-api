<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->apiResource('books', BookController::class);

