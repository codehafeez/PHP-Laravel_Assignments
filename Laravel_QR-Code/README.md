composer create-project --prefer-dist laravel/laravel qr-code-example

cd qr-code-example

composer require simplesoftwareio/simple-qrcode


config/app.php => (update)
	
	'providers' => [
        	SimpleSoftwareIO\QrCode\QrCodeServiceProvider::class,
	],
    
    	'aliases' => [
        	'QrCode' => SimpleSoftwareIO\QrCode\Facades\QrCode::class,
	]



php artisan make:controller QrCodeController


Route::get('/qrcode', [QrCodeController::class, 'index']);

php artisan serve




