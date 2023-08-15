<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;



Route::get('/', [LanguageController::class, 'index'])->name('home');
Route::get('lan-change', [LanguageController::class, 'langChange'])->name('lan.change');
