laravel new payment-stripe
cd payment-stripe

composer require stripe/stripe-php


====================================================================
Stripe
====================================================================
Publishable key
pk_test_51LGsrcEWj6dPCPyNRjfL7z1T6mriqkAXC40WRDdR8a8NGGdVb5KIlwKFb0GVobvSuJpxIhGWOxKxQ0utIRzQJ6Vd00QJoD8xRG

Secret key
sk_test_51LGsrcEWj6dPCPyNC1G7eFuB2Q37JUEDXIwtilEpMex0wz4O73pv8yVXLbjUHku7MEp9Sar8txwfRuiwbtlVHPVJ00VVrJ9E6Z

Visa Testing Card => 4242424242424242
====================================================================


.env (update)
STRIPE_KEY=pk_test_51LGsrcEWj6dPCPyNRjfL7z1T6mriqkAXC40WRDdR8a8NGGdVb5KIlwKFb0GVobvSuJpxIhGWOxKxQ0utIRzQJ6Vd00QJoD8xRG
STRIPE_SECRET=sk_test_51LGsrcEWj6dPCPyNC1G7eFuB2Q37JUEDXIwtilEpMex0wz4O73pv8yVXLbjUHku7MEp9Sar8txwfRuiwbtlVHPVJ00VVrJ9E6Z



php artisan make:controller StripePaymentController
php artisan serve
http://localhost:8000/stripe





