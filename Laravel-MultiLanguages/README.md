composer create-project --prefer-dist laravel/laravel blog
cd blog

php artisan make:controller LanguageController

php artisan make:middleware LanguageManager
php artisan serve


