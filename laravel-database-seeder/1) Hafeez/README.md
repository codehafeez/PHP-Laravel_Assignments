composer create-project laravel/laravel laravel-database-seeder
cd laravel-database-seeder


php artisan make:model Post -m
php artisan make:seeder PostsSeeder
Edit File & Update Data => database/seeders/PostsSeeder.php

php artisan make:model Employee -m
php artisan make:seeder EmployeeSeeder
Edit File & Update Data => database/seeders/EmployeeSeeder.php


Edit File & Update Data => database/seeders/DatabaseSeeder.php.php


php artisan migrate
php artisan db:seed
