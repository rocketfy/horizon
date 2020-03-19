<?php

namespace Rocketfy\Horizon\Listeners;

use Rocketfy\Horizon\Contracts\JobRepository;
use Rocketfy\Horizon\Events\JobPushed;

class StoreJob
{
    /**
     * The job repository implementation.
     *
     * @var \Rocketfy\Horizon\Contracts\JobRepository
     */
    public $jobs;

    /**
     * Create a new listener instance.
     *
     * @param  \Rocketfy\Horizon\Contracts\JobRepository  $jobs
     * @return void
     */
    public function __construct(JobRepository $jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * Handle the event.
     *
     * @param  \Rocketfy\Horizon\Events\JobPushed  $event
     * @return void
     */
    public function handle(JobPushed $event)
    {
        $this->jobs->pushed(
            $event->connectionName, $event->queue, $event->payload
        );
    }
}
