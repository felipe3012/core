<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickettemplatemandatoryfields extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickettemplatemandatoryfields';

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
    protected $fillable = ['id', 'tickettemplates_id', 'num'];
}
