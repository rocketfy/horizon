<?php

namespace Rocketfy\Horizon\Tests\Feature;

use Rocketfy\Horizon\SupervisorOptions;
use Rocketfy\Horizon\Tests\IntegrationTest;

class SupervisorOptionsTest extends IntegrationTest
{
    public function test_default_queue_is_used_when_null_is_given()
    {
        $options = new SupervisorOptions('name', 'redis');
        $this->assertSame('default', $options->queue);
    }
}
