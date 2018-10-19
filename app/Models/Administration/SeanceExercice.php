<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Seance.
 */
class SeanceExercice extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'seances_exercices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'description', 'id_seances', 'id_exercices'];

        //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;


    public function exercice() {
        return $this->belongsTo(Machine::class, 'id_exercices');
    }

    public function seance() {
        return $this->belongsTo(Machine::class, 'id_seances');
    }    
}
