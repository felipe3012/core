<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionalidades extends Model
{

    /**
     * La tabla de base de datos utilizada por el modelo.
     *
     * @var string
     */
    protected $table = 'funcionalidades';

    /**
     *
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos que se asignan en la tabla.
     *
     * @var array
     */
    protected $fillable = ['id', 'nombre', 'padre', 'icono'];
}
