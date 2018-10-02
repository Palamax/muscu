<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;
use App\Models\administration\Exercice;

/**
 * Class Machine.
 */
class Machine extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'machines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'image', 'description', 'active'];

        //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function exercices(){
        return $this->hasMany(Exercice::class);
    }
}
