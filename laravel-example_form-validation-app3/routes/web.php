<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [UserController::class, 'login']);
Route::get('/signup', [UserController::class, 'signup']);

Route::post("user/signup", [UserController::class, 'user_signup']);
Route::post("user/login", [UserController::class, 'user_login']);

