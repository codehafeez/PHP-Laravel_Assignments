CMD => composer create-project --prefer-dist laravel/laravel blog

CMD => cd blog

CMD => composer require barryvdh/laravel-dompdf


following path: config/app.php
    'providers' => [
        ....
        Barryvdh\DomPDF\ServiceProvider::class,
    ],
    
    'aliases' => [
        ....
        'PDF' => Barryvdh\DomPDF\Facade::class,
    ]


CMD => php artisan make:controller PdfController

CMD => php artisan serve




