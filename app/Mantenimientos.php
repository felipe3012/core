<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimientos extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mantenimientos';

    /**
     * [$primaryKey description]
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];
}
