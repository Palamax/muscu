<?php

namespace App\Repositories\Backend\Administration;

use App\Models\Administration\Exercice;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;

/**
 * Class ExerciceRepository.
 */
class ExerciceRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Exercice::class;
    }

    /**
     * @param Exercice  $exercice
     * @param array $data
     *
     * @return mixed
     * @throws GeneralException
     */
    public function update($id, array $data)
    {

        return DB::transaction(function () use ($id, $data) {

            $exercice = $this->getById($id);


            if ($exercice->update([
                'nom' => $data['nom'],
                'description' => $data['description'],
                'id_machines' => $data['id_machines'],
                'recuperation' => $data['recuperation'],
                'nombre_series' => $data['nombre_series'],
                'id_groupes_musculaires' => $data['id_groupes_musculaires'],
            ])) {
                return $exercice;
            }

            throw new GeneralException(__('exceptions.backend.administration.exercices.update_error'));
        });
    }    
}
