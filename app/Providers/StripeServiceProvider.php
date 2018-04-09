<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Stripe::setApiKey(config('service.stripe.secret'));

        Cashier::useCurrency('usd', '$');
    }

    /**
     * Register services.
     */
    public function register()
    {
    }
}
