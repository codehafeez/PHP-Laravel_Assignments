// create project using cmd
composer create-project --prefer-dist laravel/laravel laravel_route_controller_view
cd laravel_route_controller_view



// create pages (resources\views\pages) => page1, page2, page3


--------------------------------------------------------------------------
// routes\web.php (Add)
--------------------------------------------------------------------------
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
--------------------------------------------------------------------------


// run project using cmd
php artisan serve

