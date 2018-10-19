<?php

namespace App\Http\Controllers\Backend\Administration\Sportif;

use App\Models\Administration\Seance;
use App\Models\Administration\Exercice;
use App\Repositories\Backend\Administration\SeanceRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Administration\SeanceRequest;
use App\Http\Requests\Backend\Administration\SeanceDetailRequest;

/**
 * Class SportifController.
 */
class SportifController extends Controller
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
        $exercices = Exercice::orderBy('nom','asc')->get();

        $journees = [];
        $journees[1]['numero'] = 1;
        $journees[1]['exercices'] = $exercices;
        $journees[2]['numero'] = 2;
        $journees[2]['exercices'] = $exercices;
        return view('backend.administration.seance.edit')
            ->with('seance', $seance)
            ->with('journees', $journees);
    }

    /**
     * @param SeanceRequest $request
     * @param Seance              $seance
     *
     * @return mixed
     */
    public function ajouterJournee(SeanceRequest $request, Seance $seance)
    {
         $exercices = Exercice::orderBy('nom','asc')->get();

        $nb_jours = $request->get('nb_jours') + 1;
        $journees = $request->get('journees');
        $journees[$nb_jours]['numero'] = $nb_jours;
        $journees[$nb_jours]['exercices'] = $exercices;
        return view('backend.administration.seance.edit')
            ->with('seance', $seance)
            ->with('journees', $journees);
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
        $this->seanceRepository->update($seance->id, $request->only('nom', 'description', 'nb_jours'));

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
