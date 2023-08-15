<?php
use App\Http\Controllers\Api\AuthApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskApiController;

// Auth routes
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthApiController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/profile', [AuthApiController::class, 'profile']);
Route::post('/forgot-password', [AuthApiController::class, 'forgotPassword']);

// Task routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('tasks', [TaskApiController::class, 'index']);
    Route::post('tasks', [TaskApiController::class, 'store']);
    Route::get('tasks/{id}', [TaskApiController::class, 'show']);
    Route::post('update/{id}', [TaskApiController::class, 'update']);
    Route::post('delete/{id}', [TaskApiController::class, 'delete']);
});
