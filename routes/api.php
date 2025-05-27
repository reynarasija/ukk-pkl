<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\UserController;    
use App\Http\Controllers\Api\GuruApi;
use App\Http\Controllers\Api\IndustriApi;
use App\Http\Controllers\Api\PKLApi;

// Example public route
Route::get('/ping', fn () => response()->json(['message' => 'API is working.']));

// Protected API routes
Route::apiResource('siswas', SiswaController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('gurus', GuruApi::class);
Route::apiResource('industris', IndustriApi::class);
Route::apiResource('pkls', PKLApi::class);