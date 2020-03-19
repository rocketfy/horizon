<?php

namespace Rocketfy\Horizon;

class SupervisorFactory
{
    /**
     * Create a new supervisor instance.
     *
     * @param  \Rocketfy\Horizon\SupervisorOptions  $options
     * @return \Rocketfy\Horizon\Supervisor
     */
    public function make(SupervisorOptions $options)
    {
        return new Supervisor($options);
    }
}
