<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Repositories\admin\CategoryRepository;
use App\Repositories\admin\SupplierRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\CategoryRepository::class
        );

        $this->app->bind(CategoryRepository::class, function () {
            return new CategoryRepository();
        });
    
        $this->app->bind(SupplierRepository::class, function () {
            return new SupplierRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $settings = Setting::first();
        
        // Bagikan data settings ke seluruh view
        View::share('settings', $settings);
    }
}
