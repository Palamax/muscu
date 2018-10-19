<?php

namespace App\Http\Controllers\Backend\Administration\Exercice;

use App\Models\Auth\User;
use App\Models\Administration\Exercice;
use App\Repositories\Backend\Administration\ExerciceRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Administration\ExerciceRequest;
use App\Http\Requests\Backend\Administration\ExerciceDetailRequest;
use DB;

/**
 * Class ExerciceController.
 */
class ExerciceController extends Controller
{

    /**
     * @var ExerciceRepository
     */
    protected $exerciceRepository;

    /**
     *
     */
    public function __construct(ExerciceRepository $exerciceRepository)
    {
        $this->exerciceRepository = $exerciceRepository;
    }

    /**
     * @param ExerciceRequest $request
     *
     * @return mixed
     */
    public function index(ExerciceRequest $request)
    {
        $exercices = Exercice::orderBy('nom','asc')->get();

        return view('backend.administration.exercice.index')
            ->with('exercices', $exercices);
    }

    /**
     * @param ExerciceRequest $request
     *
     * @return mixed
     */
    public function create(ExerciceRequest $request)
    {
        $machines = DB::table('machines')->get();

        $referentiel = file_get_contents("referentiel.json");
        $datas = json_decode($referentiel, true);
        $groupes_musculaires = $datas['groupes_musculaires'];

        return view('backend.administration.exercice.create')
        ->with('machines', $machines)
        ->with('groupes_musculaires', $groupes_musculaires);
    }

    /**
     * @param ExerciceDetailRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function store(ExerciceDetailRequest $request)
    {
        $this->exerciceRepository->create($request->only('nom', 'description', 'id_machines', 'recuperation', 'nombre_series', 'id_groupes_musculaires'));

        return redirect()->route('admin.administration.exercice.index')->withFlashSuccess(__('alerts.backend.exercices.created'));
    }

    /**
     * @param ExerciceRequest $request
     * @param Exercice              $exercice
     *
     * @return mixed
     */
    public function edit(ExerciceRequest $request, Exercice $exercice)
    {
        $machines = DB::table('machines')->get();

        $referentiel = file_get_contents("referentiel.json");
        $datas = json_decode($referentiel, true);
        $groupes_musculaires = $datas['groupes_musculaires'];

        return view('backend.administration.exercice.edit')
            ->with('exercice', $exercice)
            ->with('machines', $machines)
            ->with('groupes_musculaires', $groupes_musculaires);
    }

    /**
     * @param ExerciceDetailRequest $request
     * @param Exercice              $exercice
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(ExerciceDetailRequest $request, Exercice $exercice)
    {
        $this->exerciceRepository->update($exercice->id, $request->only('nom', 'description', 'id_machines', 'recuperation', 'nombre_series', 'id_groupes_musculaires'));

        return redirect()->route('admin.administration.exercice.index')->withFlashSuccess(__('alerts.backend.exercices.updated'));
    }

    /**
     * @param ExerciceRequest $request
     * @param Exercice        $exercice
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ExerciceRequest $request, Exercice $exercice)
    {
        $this->exerciceRepository->deleteById($exercice->id);

        return redirect()->route('admin.administration.exercice.index')->withFlashSuccess(__('alerts.backend.exercices.deleted'));
    }
}
