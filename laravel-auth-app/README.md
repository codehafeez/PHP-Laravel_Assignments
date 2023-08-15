==============================
Simple Auth App
==============================
=> Login
=> Register
=> Forgot Password
=> Reset Password
=> Update Password
=> Profile
==============================




laravel new auth-app
cd auth-app
php artisan serve


create database => auth_app_db


composer require laravel/breeze
php artisan breeze:install
 
php artisan migrate
npm install
npm run dev


php artisan serve 



http://127.0.0.1:8000/login
http://127.0.0.1:8000/forgot-password
http://127.0.0.1:8000/register






===========================================================
Gmail's SMTP Guide
===========================================================
Open File and Update => .env
    MAIL_ENCRYPTION=ssl
    MAIL_HOST=mail.codehafeez.com
    MAIL_DRIVER=smtp
    MAIL_FROM_NAME="${APP_NAME}"
    MAIL_USERNAME=developer@codehafeez.com
    MAIL_PASSWORD=developer@123
    MAIL_FROM_ADDRESS=developer@codehafeez.com
    MAIL_PORT=465

Open File and Update => config/mail.php
    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'smtp.gmail.com'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'auth_mode' => null,
        ],
    ],
===========================================================






