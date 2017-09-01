<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    //
      /**
     * [$table description]
     * @var string
     */
    protected $table = 'municipios';

    /**
     * [$primaryKey description]
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * [$fillable description]
     * @var array
     */
    protected $fillable = ['descripcion','id_departamento'];

    /**
     * [$timestamps description]
     * @var boolean
     */
    public $timestamps = false;
}
