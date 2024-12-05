<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\SupplierRepository;

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
        //
    }
}
