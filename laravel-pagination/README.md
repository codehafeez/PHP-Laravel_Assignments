CMD => composer create-project laravel/laravel --prefer-dist laravel-pagination


CMD => cd laravel-pagination


.env (update db-name) => hafeez_db


CMD => php artisan make:model Employee -m


CMD => php artisan migrate


CMD => php artisan make:controller EmployeeController


Add these 2 lines => (app/Providers/AppServiceProvider.php)
    use Illuminate\Support\ServiceProvider;
    Paginator::useBootstrap();


CMD => php artisan serve
