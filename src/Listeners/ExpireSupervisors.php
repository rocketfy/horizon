<?php

namespace Rocketfy\Horizon\Listeners;

use Rocketfy\Horizon\Contracts\MasterSupervisorRepository;
use Rocketfy\Horizon\Contracts\SupervisorRepository;
use Rocketfy\Horizon\Events\MasterSupervisorLooped;

class ExpireSupervisors
{
    /**
     * Handle the event.
     *
     * @param  \Rocketfy\Horizon\Events\MasterSupervisorLooped  $event
     * @return void
     */
    public function handle(MasterSupervisorLooped $event)
    {
        app(MasterSupervisorRepository::class)->flushExpired();

        app(SupervisorRepository::class)->flushExpired();
    }
}
