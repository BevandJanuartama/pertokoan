<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route; // <<< IMPORT Route Facade
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
        // --- BLOK TAMBAHAN UNTUK MEMASTIKAN API ROUTE DIMUAT ---
        Route::prefix('api') // Memberi prefix '/api'
            ->middleware('api') // Menggunakan middleware API default (Rate Limiting, dll.)
            ->group(base_path('routes/api.php'));
        // --------------------------------------------------------
    }
}
