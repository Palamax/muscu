<?php

namespace App\Http\Controllers\Backend\Administration\Seance;

use App\Models\Administration\Seance;
use App\Models\Administration\Exercice;
use App\Repositories\Backend\Administration\SeanceRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Administration\SeanceRequest;
use App\Http\Requests\Backend\Administration\SeanceDetailRequest;

/**
 * Class SeanceController.
 */
class SeanceController extends Controller
{

    /**
     * @var SeanceRepository
     */
    protected $seanceRepository;

    /**
     *
     */
    public function __construct(SeanceRepository $seanceRepository)
    {
        $this->seanceRepository = $seanceRepository;
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function index(SeanceRequest $request)
    {
        $seances = Seance::orderBy('nom','asc')->get();

        return view('backend.administration.seance.index')
            ->with('seances', $seances);
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function create(SeanceRequest $request)
    {
        return view('backend.administration.seance.create');
    }

    /**
     * @param SeanceRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function store(SeanceDetailRequest $request)
    {
        $this->seanceRepository->create($request->only('nom', 'description', 'nb_jours'));

        return redirect()->route('admin.administration.seance.index')->withFlashSuccess(__('alerts.backend.seances.created'));
    }

    /**
     * @param SeanceRequest $request
     * @param Seance              $seance
     *
     * @return mixed
     */
    public function edit(SeanceRequest $request, Seance $seance)
    {
        $exercicesSeance = $seance->exercices;

        $exercices = Exercice::orderBy('nom','asc')->get();

        //print_r($exercicesSeance);
        //var_dump($exercices);

        return view('backend.administration.seance.edit')
            ->with('seance', $seance)
            ->with('exercicesSeance', $exercicesSeance)
            ->with('exercices', $exercices);
    }

    /**
     * @param SeanceRequest $request
     * @param Seance              $seance
     *
     * @return mixed
     */
    public function ajouterExercice(SeanceRequest $request, Seance $seance)
    {
        //$exercices = Exercice::orderBy('nom','asc')->get();
        $id_exercices= $request->input('nom');
        echo("<".$id_exercices.">");
        $exercice = Exercice::where('id', $id_exercices)->get();
        //array_push($seance->exercices, $exercice);
        $seance->exercices->push($exercice);

print_r($seance->exercices);

        $seance->save();

        return null;
    }

    /**
     * @param SeanceRequest $request
     * @param Seance              $seance
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(SeanceDetailRequest $request, Seance $seance)
    {
        $this->seanceRepository->update($seance->id, $request->only('nom', 'description'));

        return redirect()->route('admin.administration.seance.index')->withFlashSuccess(__('alerts.backend.seances.updated'));
    }

    /**
     * @param SeanceRequest $request
     * @param Seance        $seance
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(SeanceRequest $request, Seance $seance)
    {
        $this->seanceRepository->deleteById($seance->id);

        return redirect()->route('admin.administration.seance.index')->withFlashSuccess(__('alerts.backend.seances.deleted'));
    }
}
