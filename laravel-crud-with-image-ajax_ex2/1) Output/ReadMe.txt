DB_DATABASE=hafeez_db
DB_USERNAME=root
DB_PASSWORD=



composer install

composer update

php artisan migrate

php artisan key:generate

php artisan serve

http://127.0.0.1:8000/list
