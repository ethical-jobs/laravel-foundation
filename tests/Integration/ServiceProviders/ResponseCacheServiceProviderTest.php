<?php

namespace Tests\Integration\ServiceProviders;

class ResponseCacheServiceProviderTest extends \Tests\TestCase
{
    /**
     * @test
     * @group Unit
     */
    public function it_loads_response_cache_service_provider()
    {
        $providers = $this->app->getLoadedProviders();

        $this->assertTrue($providers[\Spatie\ResponseCache\ResponseCacheServiceProvider::class]);
    }     

    /**
     * @test
     * @group Unit
     */
    public function it_registers_cache_profile_from_our_config()
    {
        $this->assertEquals(
            config('responsecache.cache_profile'), 
            \EthicalJobs\Foundation\Caching\RequestCacheProfile::class
        );
    }

    /**
     * @test
     * @group Unit
     */
    public function it_registers_redis_cache_store()
    {
        $this->assertEquals(
            config('responsecache.cache_store'), 
            'redis'
        );
    }    

    /**
     * @test
     * @group Unit
     */
    public function it_registers_ej_cache_tag()
    {
        $this->assertEquals(
            config('responsecache.cache_tag'), 
            'es:cache:response'
        );        
    }            
}
