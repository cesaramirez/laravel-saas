<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Blade::if('subscribed', function () {
            return auth()->user()->hasSubscription();
        });

        Blade::if('notsubscribed', function () {
            return ! auth()->check() || auth()->user()->doesNotHaveSubscription();
        });

        Blade::if('subscriptioncancelled', function () {
            return auth()->user()->hasCancelled();
        });

        Blade::if('subscriptionnotcancelled', function () {
            return auth()->user()->hasNotCancelled();
        });
    }

    /**
     * Register services.
     */
    public function register()
    {
    }
}
