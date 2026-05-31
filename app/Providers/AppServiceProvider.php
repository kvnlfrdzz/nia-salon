<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Artisan;
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
        // Jika aplikasi berjalan di server Render (production)
        if ($this->app->environment('production')) {
            // 1. Otomatis jalankan migrasi database ke Supabase
            Artisan::call('migrate', ['--force' => true]);
            
            // 2. Paksa semua aset CSS/JS dan URL menggunakan HTTPS
            URL::forceScheme('https');
        }
    }
}