<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
  
Route::get('/', [FileController::class, 'index']);
Route::post('/image-resize', [FileController::class, 'imgResize'])->name('img-resize');