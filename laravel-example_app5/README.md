create file => app -> helpers.php
add file in composer.json =>

    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        },
        "files": [
            "app/helpers.php"
        ]
    },
    

composer dump-autoload

php artisan serve



https://advancedwebtuts.com/tutorial/how-to-create-custom-helper-function-in-laravel-9-with-example
