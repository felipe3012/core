<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permisos';

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
    protected $fillable = ['perfil', 'funcionalidad'];
}
