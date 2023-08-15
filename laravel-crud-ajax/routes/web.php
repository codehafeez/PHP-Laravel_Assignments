<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/countries', [CountriesController::class, 'index'])->name('countries.list');
Route::post('/add-country',[CountriesController::class, 'addCountry'])->name('add.country');
Route::get('/get-countries', [CountriesController::class, 'getCountries'])->name('get.countries.list');
Route::post('/get-countries-details', [CountriesController::class, 'getCountriesDetails'])->name('get.countries.details');
Route::post('/update-countries-details',[CountriesController::class, 'updateCountriesDetails'])->name('update.countries.details');
Route::post('/deleteCountry',[CountriesController::class,'deleteCountry'])->name('delete.country');
