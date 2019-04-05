<?php

namespace Tests\Integration\ServiceProviders;

use EthicalJobs\Foundation\Http\Normalizr;
use Spatie\Fractal\FractalServiceProvider;
use Tests\TestCase;

class FractalServiceProviderTest extends TestCase
{
    /**
     * @test
     * @group Unit
     */
    public function it_registers_normalizer_from_our_config()
    {
        $config = config('fractal');

        $this->assertEquals($config['default_serializer'], Normalizr::class);
    }

    /**
     * @test
     * @group Unit
     */
    public function it_enables_auto_includes()
    {
        $config = config('fractal');

        $this->assertTrue($config['auto_includes']['enabled']);
    }

    /**
     * @test
     * @group Unit
     */
    public function it_loads_fractal_service_provider()
    {
        $providers = $this->app->getLoadedProviders();

        $this->assertTrue($providers[FractalServiceProvider::class]);
    }
}
