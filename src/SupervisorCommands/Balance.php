<?php

namespace Rocketfy\Horizon\SupervisorCommands;

use Rocketfy\Horizon\Supervisor;

class Balance
{
    /**
     * Process the command.
     *
     * @param  \Rocketfy\Horizon\Supervisor  $supervisor
     * @param  array  $options
     * @return void
     */
    public function process(Supervisor $supervisor, array $options)
    {
        $supervisor->balance($options);
    }
}
