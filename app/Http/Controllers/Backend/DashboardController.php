<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Administration\Machine;
use App\Models\Administration\Exercice;
use App\Models\Administration\Seance;
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

        $nbExercices = Exercice::count();
        $nbSeances = Seance::count();

		$referentiel = file_get_contents("referentiel.json");
		$datas = json_decode($referentiel, true);
		$groupes_musculaires = $datas['groupes_musculaires'];

        return view('backend.dashboard')
        	->with('nbMachinesActives', $nbMachinesActives)
            ->with('nbMachines', $nbMachines)
            ->with('nbExercices', $nbExercices)
            ->with('nbSeances', $nbSeances)
            ->with('groupes_musculaires', $groupes_musculaires);
    }
}
