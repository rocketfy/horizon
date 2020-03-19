<?php

namespace Rocketfy\Horizon\Tests\Feature\Fixtures;

use Rocketfy\Horizon\SupervisorProcess;

class SupervisorProcessWithFakeRestart extends SupervisorProcess
{
    public $wasRestarted = false;

    public function restart()
    {
        $this->wasRestarted = true;
    }
}
