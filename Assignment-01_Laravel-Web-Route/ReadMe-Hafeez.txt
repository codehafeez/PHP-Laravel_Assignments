// create project using cmd
composer create-project --prefer-dist laravel/laravel laravel_route_example
cd laravel_route_example


--------------------------------------------------------------------------
// routes\web.php (Add)
--------------------------------------------------------------------------
Route::get('/', function () {
    return 'Hello, World!';
});


Route::post('/submit', function () {
    return 'Form submitted!';
});


Route::get('/users/{id}', function ($id) {
    return 'User ID: ' . $id;
});


Route::get('/profile', function () {
    return 'User profile page';
})->name('profile');


Route::get('/users', function () {
    $users = [
        ['name' => 'John Doe', 'email' => 'john@example.com'],
        ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
    ];
    return $users;
});


Route::get('/users-json', function () {
    $users = [
        ['name' => 'John Doe', 'email' => 'john@example.com'],
        ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
    ];
    return response()->json($users);
});
--------------------------------------------------------------------------


// run project using cmd
php artisan serve

