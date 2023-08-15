<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', [PostController::class, 'index']);
Route::resource('posts', PostController::class);

Route::get('/slider', [PostController::class, 'sliderdelay_read']);
Route::post('/slider-update', [PostController::class, 'sliderdelay_update']);
