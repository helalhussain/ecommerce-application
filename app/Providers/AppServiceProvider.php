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
        view()->composer('layouts.admin.partials.script', function ($view) {
            $view->with([
                'permissions' => auth()->check() ? auth()->user()->role?->permissions : []
            ]);
        });
    }
}
