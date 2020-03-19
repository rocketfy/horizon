<?php

namespace Rocketfy\Horizon\Listeners;

use Rocketfy\Horizon\Contracts\JobRepository;
use Rocketfy\Horizon\Events\JobFailed;

class MarkJobAsFailed
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
     * @param  \Rocketfy\Horizon\Events\JobFailed  $event
     * @return void
     */
    public function handle(JobFailed $event)
    {
        $this->jobs->failed(
            $event->exception, $event->connectionName,
            $event->queue, $event->payload
        );
    }
}
