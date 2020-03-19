<?php

namespace Rocketfy\Horizon\Tests\Feature;

use Laravel\Facades\Config;
use Rocketfy\Horizon\Horizon;
use Rocketfy\Horizon\Tests\IntegrationTest;

class RedisPrefixTest extends IntegrationTest
{
    public function test_prefix_can_be_configured()
    {
        config(['horizon.prefix' => 'custom:']);

        Horizon::use('default');

        $this->assertEquals('custom:', config('database.redis.horizon.options.prefix'));
    }
}
