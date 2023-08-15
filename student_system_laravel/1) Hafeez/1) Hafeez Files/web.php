<?php
use Illuminate\Support\Facades\Route;





Route::get('/', 'AdminController@login');
Route::post('islogin', 'AdminController@islogin');
Route::get('logout', 'AdminController@logout');
Route::get('dashboard', 'AdminController@login');


Route::get('load', 'StudentController@load');
Route::get('register', 'StudentController@register');
Route::post('store', 'StudentController@store');
Route::get('edit/{id}', 'StudentController@edit');
Route::post('update/{id}', 'StudentController@update');
Route::get('destroy/{id}', 'StudentController@destroy');






