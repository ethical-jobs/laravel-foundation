<?php

namespace Tests\Integration\ServiceProviders;

use Mockery;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Tests\Fixtures;

class QueueServiceProviderTest extends \Tests\TestCase
{
    /**
     * @test
     * @group Unit
     */
    public function it_loads_queue_service_provider()
    {
        $providers = $this->app->getLoadedProviders();

        $this->assertTrue($providers[\EthicalJobs\Foundation\Laravel\QueueServiceProvider::class]);
    }  

    /**
     * @test
     * @group Unit
     */
    public function it_logs_failing_queue_items()
    {        
        $this->expectException(\Exception::class);

        $validateArguments = function ($arg1, $arg2) {
            $this->assertEquals('ej:queue:fail', $arg1);
            $this->assertEquals($arg2['job'], Fixtures\FailingQueueJob::class);
            $this->assertEquals($arg2['service'], 'Laravel');
            $this->assertEquals($arg2['connection'], 'sync');
            $this->assertEquals($arg2['exception']['message'], 'We have run out of milk!');
            $this->assertEquals($arg2['exception']['line'], 22);
            $this->assertTrue(is_string($arg2['exception']['trace']));
            return true;
        };

        Log::shouldReceive('critical')
            ->once()
            ->withArgs($validateArguments);

        Fixtures\FailingQueueJob::dispatch();
    }      
}
