<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Exercice.
 */
class Exercice extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exercices';

    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'description', 'id_machines', 'recuperation', 'nombre_series', 'id_groupes_musculaires'];

    public function machine() {
        return $this->belongsTo(Machine::class, 'id_machines');
    }

    public function nomGroupeMusculaire(){


        $referentiel = file_get_contents("referentiel.json");
        $datas = json_decode($referentiel, true);
        $groupes_musculaires = $datas['groupes_musculaires'];

        foreach ($groupes_musculaires as $groupe_musculaire){
            if ($this->id_groupes_musculaires == $groupe_musculaire['id']){
                return $groupe_musculaire['nom'];
            }
        }
        return '';
    }

    public function imageGroupeMusculaire(){


        $referentiel = file_get_contents("referentiel.json");
        $datas = json_decode($referentiel, true);
        $groupes_musculaires = $datas['groupes_musculaires'];

        foreach ($groupes_musculaires as $groupe_musculaire){
            if ($this->id_groupes_musculaires == $groupe_musculaire['id']){
                return $groupe_musculaire['image'];
            }
        }
        return '';
    }    
}
