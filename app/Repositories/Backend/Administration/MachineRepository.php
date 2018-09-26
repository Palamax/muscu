<?php

namespace App\Repositories\Backend\Administration;

use App\Models\Administration\Machine;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;

/**
 * Class MachineRepository.
 */
class MachineRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Machine::class;
    }

    /**
     * @param Machine  $machine
     * @param array $data
     *
     * @return mixed
     * @throws GeneralException
     */
    public function update($id, array $data, $image = false)
    {

        return DB::transaction(function () use ($id, $data, $image) {

            $machine = $this->getById($id);

            if (ISSET($data['active'])){
                $active = 1;
            }else{
                $active = 0;
            }

            if ($image){
                 $image_machine = $image->store('/avatars', 'public');
            }else{
                $image_machine = $machine->image;
            }

            if ($machine->update([
                'nom' => $data['nom'],
                'description' => $data['description'],
                'active' => $active,
                'image' => $image_machine,
            ])) {
                return $machine;
            }

            throw new GeneralException(__('exceptions.backend.administration.machines.update_error'));
        });
    }    
}
