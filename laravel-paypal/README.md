laravel new laravel-paypal
cd laravel-paypal


Install Package CMD => composer require srmklive/PayPal
Install Package CMD => php artisan vendor:publish --provider "Srmklive\PayPal\Providers\PayPalServiceProvider"


Create Controller => app/Http/Controllers/PaypalController.php
Create Blade file => resources/views/paypal/index.blade.php


---------------------------------------------------------------------------
.env (update)
---------------------------------------------------------------------------
PAYPAL_MODE=sandbox
PAYPAL_SANDBOX_CLIENT_ID=**************************************
PAYPAL_SANDBOX_CLIENT_SECRET=**********************************
---------------------------------------------------------------------------


---------------------------------------------------------------------------
routes/web.php (Update)
---------------------------------------------------------------------------
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
});
---------------------------------------------------------------------------



php artisan serve
http://127.0.0.1:8000/paypal/payment


