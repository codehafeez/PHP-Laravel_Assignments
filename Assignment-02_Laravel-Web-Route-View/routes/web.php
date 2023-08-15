<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fun1', function () {
    $title = 'title message, hello world';
    return view('pages.page1')->with('title', $title);
});

Route::get('/fun2/{id}/{name}', function ($id, $name) {
    $users = [
        ['id' => $id, 'name' => $name],
    ];
    return View::make('pages.page2')->with('users', $users);
});

Route::get('/fun3', function () {
    $users = [
        ['name' => 'John Doe', 'email' => 'john@example.com'],
        ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
    ];
    return View::make('pages.page3')->with('users', $users);
});
