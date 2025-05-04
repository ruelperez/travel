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
        Xendit::setApiKey(env('xnd_development_ZQHbTphZrHaRyJ2XwxBETeiCqABTVK6MHDz1otjAMu9vAWXNjARkuX69OzO2'));
    }
}
