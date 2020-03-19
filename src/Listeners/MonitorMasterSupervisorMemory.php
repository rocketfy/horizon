<?php

namespace Rocketfy\Horizon\Listeners;

use Rocketfy\Horizon\Events\MasterSupervisorLooped;

class MonitorMasterSupervisorMemory
{
    /**
     * Handle the event.
     *
     * @param  \Rocketfy\Horizon\Events\MasterSupervisorLooped  $event
     * @return void
     */
    public function handle(MasterSupervisorLooped $event)
    {
        $master = $event->master;

        if ($master->memoryUsage() > config('horizon.memory_limit', 64)) {
            $master->terminate(12);
        }
    }
}
