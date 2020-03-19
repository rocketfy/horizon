<?php

namespace Rocketfy\Horizon\SupervisorCommands;

use Rocketfy\Horizon\Supervisor;

class Scale
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
        $supervisor->scale($options['scale']);
    }
}
