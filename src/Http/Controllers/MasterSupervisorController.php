<?php

namespace Rocketfy\Horizon\Http\Controllers;

use Rocketfy\Horizon\Contracts\MasterSupervisorRepository;
use Rocketfy\Horizon\Contracts\SupervisorRepository;

class MasterSupervisorController extends Controller
{
    /**
     * Get all of the master supervisors and their underlying supervisors.
     *
     * @param  \Rocketfy\Horizon\Contracts\MasterSupervisorRepository  $masters
     * @param  \Rocketfy\Horizon\Contracts\SupervisorRepository  $supervisors
     * @return \Illuminate\Support\Collection
     */
    public function index(MasterSupervisorRepository $masters,
                          SupervisorRepository $supervisors)
    {
        $masters = collect($masters->all())->keyBy('name')->sortBy('name');

        $supervisors = collect($supervisors->all())->sortBy('name')->groupBy('master');

        return $masters->each(function ($master, $name) use ($supervisors) {
            $master->supervisors = $supervisors->get($name);
        });
    }
}
