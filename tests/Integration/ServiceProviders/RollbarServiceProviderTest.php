<?php

namespace Tests\Integration\ServiceProviders;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class RollbarServiceProviderTest extends \Tests\TestCase
{
    // Currently cant set the environment during testing to check this.
    // 
    // /**
    //  * @test
    //  * @group Unit
    //  */
    // public function it_loads_rollbar_service_provider_in_correct_envs()
    // {
    //     $providers = $this->app->getLoadedProviders();

    //     $this->assertTrue($providers['Rollbar\Laravel\RollbarServiceProvider']);
    // }     

    // /**
    //  * @test
    //  * @group Unit
    //  */
    // public function it_loads_package_config()
    // {
    //     $config = config('services');

    //     $this->assertTrue(array_has($config, 'rollbar'));

    //     $this->assertTrue(array_has($config, 'rollbar.access_token'));
    // }     

    /**
     * @test
     * @group Unit
     */
    public function it_returns_true()
    {
        $this->assertTrue(true);
    }      
}
