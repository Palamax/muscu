<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Administration\Machine;
use DB;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $nbMachines = Machine::count();

		$nbMachinesActives = DB::table('machines')->where('active', '=',  1)->get()->count();

        return view('backend.dashboard')
        	->with('nbMachinesActives', $nbMachinesActives)
            ->with('nbMachines', $nbMachines);
    }
}
