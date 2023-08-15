<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('student',[StudentController::class,'index']);
Route::post('/student',[StudentController::class,'addStudent']);
Route::get('/getdata',[StudentController::class,"getdata"]);
Route::get('/edit/{id}',[StudentController::class,"edit"]);
Route::post('/update/{id}',[StudentController::class,'update']);

Route::delete('/delete/{id}',[StudentController::class,"deleteStudent"]);


