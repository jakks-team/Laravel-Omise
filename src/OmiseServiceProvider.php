<?php

namespace wenhaokho\Omise;

use wenhaokho\Omise\process\OmiseCharge;
use wenhaokho\Omise\process\OmiseSource;
use wenhaokho\Omise\process\OmiseCustomer;
use wenhaokho\Omise\process\OmiseCard;
use wenhaokho\Omise\process\OmiseEvent;
use Illuminate\Support\ServiceProvider;

class OmiseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/omise.php' => config_path('omise.php'),
        ], 'config');
    }

    public function register()
    {
        $configPath = __DIR__ . '/config/omise.php';
        $this->mergeConfigFrom($configPath, 'omise');

        $this->app->call([$this, 'registerOmiseCharge']);
        $this->app->call([$this, 'registerOmiseSource']);
        $this->app->call([$this, 'registerOmiseCustomer']);
        $this->app->call([$this, 'registerOmiseCard']);
        $this->app->call([$this, 'registerOmiseEvent']);
    }

    public function registerOmiseCharge()
    {
        $this->app->singleton(OmiseCharge::class, function () {
            return new OmiseCharge;
        });
    }

    public function registerOmiseSource()
    {
        $this->app->singleton(OmiseSource::class, function () {
            return new OmiseSource;
        });
    }

    public function registerOmiseCustomer()
    {
        $this->app->singleton(OmiseCustomer::class, function () {
            return new OmiseCustomer;
        });
    }

    public function registerOmiseCard()
    {
        $this->app->singleton(OmiseCard::class, function () {
            return new OmiseCard;
        });
    }

    public function registerOmiseEvent()
    {
        $this->app->singleton(OmiseEvent::class, function () {
            return new OmiseEvent;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Omise::class];
    }
}
