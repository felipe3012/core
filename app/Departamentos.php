<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    //
    /**
     * [$table description]
     * @var string
     */
    protected $table = 'departamentos';

    /**
     * [$primaryKey description]
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * [$fillable description]
     * @var array
     */
    protected $fillable = ['descripcion'];

    /**
     * [$timestamps description]
     * @var boolean
     */
    public $timestamps = false;
}

