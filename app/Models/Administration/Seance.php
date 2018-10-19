<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;
use App\Models\administration\Exercice;

/**
 * Class Seance.
 */
class Seance extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'seances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'description'];

        //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;


    public function exercices(){
        return $this->belongsToMany(Exercice::class, 'seances_exercices', 'id_seances', 'id_exercices');
    }
}
