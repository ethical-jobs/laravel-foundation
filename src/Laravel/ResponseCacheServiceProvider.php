<?php

namespace EthicalJobs\Foundation\Laravel;

use Illuminate\Support\ServiceProvider;

/**
 * Response cache service provider
 *
 * @author Andrew McLagan <andrew@ethicaljobs.com.au>
 */
class ResponseCacheServiceProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Bind Repository interfaces to their appropriate implementations.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Spatie\ResponseCache\ResponseCacheServiceProvider::class);

        $this->extendConfig();
    }

    /**
     * Override response cache config
     *
     * @return void
     */
    protected function extendConfig()
    {
        $source = realpath(__DIR__ . '/../../config/responsecache.php');

        $config = $this->app['config']->get('responsecache', []);

        $this->app['config']->set('responsecache', array_merge($config, require $source));
    }
}