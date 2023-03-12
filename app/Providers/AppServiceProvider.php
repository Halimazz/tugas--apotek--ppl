<?php

namespace App\Providers;

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
        view()->share('admin', 'admin/layout/main');
        
        view()->share('dokter', 'dokter/layout/main');
        
        view()->share('apoteker', 'apoteker/layout/main');
        
        view()->share('kasir', 'kasir/layout/main');
    }
}
