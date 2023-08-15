<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController; 


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('posts', [PostController::class, 'posts']);

Route::get('delay', [PostController::class, 'delay']);
Route::get('images', [PostController::class, 'images']);
Route::get('videos', [PostController::class, 'videos']);
