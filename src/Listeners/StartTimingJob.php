<?php

namespace Rocketfy\Horizon\Listeners;

use Rocketfy\Horizon\Events\JobReserved;
use Rocketfy\Horizon\Stopwatch;

class StartTimingJob
{
    /**
     * The stopwatch instance.
     *
     * @var \Rocketfy\Horizon\Stopwatch
     */
    public $watch;

    /**
     * Create a new listener instance.
     *
     * @param  \Rocketfy\Horizon\Stopwatch  $watch
     * @return void
     */
    public function __construct(Stopwatch $watch)
    {
        $this->watch = $watch;
    }

    /**
     * Handle the event.
     *
     * @param  \Rocketfy\Horizon\Events\JobReserved  $event
     * @return void
     */
    public function handle(JobReserved $event)
    {
        $this->watch->start($event->payload->id());
    }
}
