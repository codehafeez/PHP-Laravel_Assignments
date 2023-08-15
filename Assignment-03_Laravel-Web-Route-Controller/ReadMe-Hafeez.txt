// create project using cmd
composer create-project --prefer-dist laravel/laravel laravel_route_controller
cd laravel_route_controller


// create controller using cmd
php artisan make:controller UserController


--------------------------------------------------------
// Add (app\Http\Controllers\DataController.php)
--------------------------------------------------------
public function fun1(){  
    return 'data function 1';
}  

public function fun2($id, $name){
    return "data function 2 => id:$id = name:$name";
}

public function fun3(){  
    $users = [
        ['name' => 'John Doe', 'email' => 'john@example.com'],
        ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
    ];
    return $users;
}
--------------------------------------------------------




--------------------------------------------------------------------------
// routes\web.php (Add)
--------------------------------------------------------------------------
use App\Http\Controllers\DataController;

Route::get('/fun1', [DataController::class, 'fun1']);
Route::get('/fun2/{id}/{name}', [DataController::class, 'fun2']);
Route::get('/fun3', [DataController::class, 'fun3']);
--------------------------------------------------------------------------


// run project using cmd
php artisan serve

