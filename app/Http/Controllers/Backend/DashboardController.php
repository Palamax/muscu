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

		$referentiel = file_get_contents("referentiel.json");
		$datas = json_decode($referentiel, true);
		$groupes_musculaires = $datas['groupes_musculaires'];

        return view('backend.dashboard')
        	->with('nbMachinesActives', $nbMachinesActives)
            ->with('nbMachines', $nbMachines)
            ->with('groupes_musculaires', $groupes_musculaires);
    }
}
