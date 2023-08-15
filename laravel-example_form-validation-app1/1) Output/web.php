<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [UserController::class, 'create']);
Route::post("user/signup", [UserController::class, 'store']);

