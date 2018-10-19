<?php

namespace App\Repositories\Backend\Administration;

use App\Models\Administration\Seance;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;

/**
 * Class SeanceRepository.
 */
class SeanceRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Seance::class;
    }

    /**
     * @param Seance  $seance
     * @param array $data
     *
     * @return mixed
     * @throws GeneralException
     */
    public function update($id, array $data)
    {

        return DB::transaction(function () use ($id, $data) {

            $seance = $this->getById($id);


            if ($seance->update([
                'nom' => $data['nom'],
                'description' => $data['description'],
            ])) {
                return $seance;
            }

            throw new GeneralException(__('exceptions.backend.administration.seances.update_error'));
        });
    }    
}
