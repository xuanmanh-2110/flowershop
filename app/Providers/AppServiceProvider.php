<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS URLs in production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
            URL::forceRootUrl(config('app.url'));
            
            // Set server variables to force HTTPS detection
            $_SERVER['HTTPS'] = 'on';
            $_SERVER['SERVER_PORT'] = 443;
        }
    }
}
