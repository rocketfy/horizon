<?php

namespace Rocketfy\Horizon\Tests\Feature\Fixtures;

use Rocketfy\Horizon\SupervisorFactory;
use Rocketfy\Horizon\SupervisorOptions;
use Rocketfy\Horizon\Tests\Feature\Fakes\SupervisorWithFakeMonitor;

class FakeSupervisorFactory extends SupervisorFactory
{
    public $supervisor;

    public function make(SupervisorOptions $options)
    {
        return $this->supervisor = new SupervisorWithFakeMonitor($options);
    }
}
