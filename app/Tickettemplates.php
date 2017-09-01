<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickettemplates extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickettemplates';

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
    protected $fillable = ['id', 'name', 'entities_id', 'is_recursive', 'comment'];
}

