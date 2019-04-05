<?php

namespace Tests;

use EthicalJobs\Foundation\Laravel;
use EthicalJobs\Foundation\Testing\ExtendsAssertions;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Orchestra\Database\ConsoleServiceProvider;
use Spatie\Fractal\FractalFacade;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    use ExtendsAssertions;

    /**
     * Setup the test environment.
     *
     * @return void
     * @throws Exception
     */
    protected function setUp()
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->withFactories(__DIR__ . '/../database/factories');
    }

    /**
     * Inject package service provider
     *
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            Laravel\LoggingServiceProvider::class,
            Laravel\FractalServiceProvider::class,
            Laravel\QueueServiceProvider::class,
            Laravel\ResponseCacheServiceProvider::class,
            ConsoleServiceProvider::class,
        ];
    }

    /**
     * Inject package facade aliases
     *
     * @param Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Fractal' => FractalFacade::class,
        ];
    }
}