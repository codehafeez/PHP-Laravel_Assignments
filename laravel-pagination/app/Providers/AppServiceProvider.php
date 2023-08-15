<?php
namespace App\Providers;
use Illuminate\Pagination\Paginator; // add by hafeez
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        // add by hafeez
        Paginator::useBootstrap();
    }
}
