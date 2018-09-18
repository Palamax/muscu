<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

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
}
