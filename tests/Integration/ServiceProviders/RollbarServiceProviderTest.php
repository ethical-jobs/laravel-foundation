<?php

namespace Tests\Integration\ServiceProviders;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use EthicalJobs\Foundation\Laravel\LoggingServiceProvider;

class RollbarServiceProviderTest extends \Tests\TestCase
{
    /**
     * @test
     */
    public function it_loads_rollbar_service_provider_in_production()
    {        
        App::shouldReceive('environment')->andReturn('production');
        
        $this->app->register(LoggingServiceProvider::class, [], true);
        
        $providers = $this->app->getLoadedProviders();

        $this->assertTrue($providers['Rollbar\Laravel\RollbarServiceProvider']);    
    }     

    /**
     * @test
     */
    public function it_loads_rollbar_service_provider_in_staging()
    {        
        App::shouldReceive('environment')->andReturn('staging');
        
        $this->app->register(LoggingServiceProvider::class, [], true);
        
        $providers = $this->app->getLoadedProviders();

        $this->assertTrue($providers['Rollbar\Laravel\RollbarServiceProvider']);       
    }       

    /**
     * @test
     */
    public function it_does_not_load_rollbar_service_provider_in_other_envs()
    {        
        $this->app->register(LoggingServiceProvider::class, [], true);
        
        $providers = $this->app->getLoadedProviders();

        $this->assertFalse(isset($providers['Rollbar\Laravel\RollbarServiceProvider']));

        $this->assertEquals('testing', $this->app->environment());
    }           

    /**
     * @test
     */
    public function it_loads_package_config()
    {
        App::shouldReceive('environment')->andReturn('staging');
        
        $this->app->register(LoggingServiceProvider::class, [], true);

        $config = config('services');

        $this->assertTrue(array_has($config, 'rollbar'));

        $this->assertTrue(array_has($config, 'rollbar.access_token'));
    }     
}
