<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/fun1', [DataController::class, 'fun1']);
Route::get('/fun2/{id}/{name}', [DataController::class, 'fun2']);
Route::get('/fun3', [DataController::class, 'fun3']);


