<?php

namespace Rocketfy\Horizon\Http\Controllers;

use Illuminate\Support\Str;
use Rocketfy\Horizon\Horizon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->menu = [];
        $this->active_item = 'horizon';
        $this->active_item_config = '';

        foreach (DB::select('SELECT table_name, icon FROM backetfy_configurations WHERE view AND NOT config AND NOT invoice AND NOT web  AND table_name NOT IN ("users", "configs")') as $table) {
            $newdata =  array(
                'table' => Str::slug($table->table_name),
                'icon' => $table->icon
            );
            array_push($this->menu, $newdata);
        }

        $newdata =  array(
            'table' => 'horizon',
            'icon' => 'bx bx-pencil'
        );
        array_push($this->menu, $newdata);
    }
    /**
     * Single page application catch-all route.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = $this->menu;
        $active_item = $this->active_item;

        return view('horizon::layout', [
            'cssFile' => Horizon::$useDarkTheme ? 'app-dark.css' : 'app.css',
            'horizonScriptVariables' => Horizon::scriptVariables(),
            'active_item' => 'horizon',
            'menu' => $menu,
            'nocard' => 1,
        ]);
    }
}
