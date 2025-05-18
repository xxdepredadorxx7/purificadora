<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // Forzar HTTPS en entorno local (útil para pruebas con Ngrok)
        if (app()->environment('local')) {
            URL::forceScheme('https');
        }

        Gate::define('admin.access', function ($user) {
            return $user->role === 'admin';
        });
    }
}
