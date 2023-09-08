<?php

namespace App\Providers;

use App\Contracts\PaymentServiceInterface;
use App\Services\PaypalGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $models = array(
            'Cart'
        );

        foreach ($models as $model) {
            $this->app->bind("App\Contracts\\{$model}Interface", "App\Services\\{$model}Service");
        }

        $this->app->bind(PaymentServiceInterface::class, function() {
            return new PaypalGateway(); // Add switch here for different payment methods
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
