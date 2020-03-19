<?php

namespace Rocketfy\Horizon\Console;

use Illuminate\Console\Command;
use Rocketfy\Horizon\Contracts\MasterSupervisorRepository;

class StatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'horizon:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the current status of Horizon';

    /**
     * Execute the console command.
     *
     * @param  \Rocketfy\Horizon\Contracts\MasterSupervisorRepository  $masterSupervisorRepository
     * @return void
     */
    public function handle(MasterSupervisorRepository $masterSupervisorRepository)
    {
        $this->line($this->currentStatus($masterSupervisorRepository));
    }

    /**
     * Get the current status of Horizon.
     *
     * @param  \Rocketfy\Horizon\Contracts\MasterSupervisorRepository  $masterSupervisorRepository
     * @return string
     */
    protected function currentStatus(MasterSupervisorRepository $masterSupervisorRepository)
    {
        if (! $masters = $masterSupervisorRepository->all()) {
            return 'Horizon is inactive.';
        }

        return collect($masters)->contains(function ($master) {
            return $master->status === 'paused';
        }) ? 'Horizon is paused.' : 'Horizon is running.';
    }
}
