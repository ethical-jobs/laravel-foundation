<?php

namespace EthicalJobs\Foundation\Laravel;

use Rollbar\Laravel\RollbarServiceProvider;

/**
 * Logging service provider
 *
 * @author Andrew McLagan <andrew@ethicaljobs.com.au>
 */

class LoggingServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot() {}

    /**
     * Bind Repository interfaces to their appropriate implementations.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRollbar();
    }

    /**
     * Register rollbar service provider
     *
     * @return void
     */
    public function registerRollbar() : void
    {
        $this->extendConfig();

        $this->app->register(RollbarServiceProvider::class);
    }   

    /**
     * Override services config
     *
     * @return void
     */
    protected function extendConfig()
    {    
        $source = realpath(__DIR__.'/../../config/logging.php');

        $this->mergeConfigFrom($source, 'logging');        
    }       
}