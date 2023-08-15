# create new project

laravel new payment-stripe
cd payment-stripe

# composer require stripe/stripe-php


# .env (update)
STRIPE_KEY=*******************
STRIPE_SECRET=***************************



php artisan make:controller StripePaymentController


php artisan serve


http://localhost:8000/stripe





