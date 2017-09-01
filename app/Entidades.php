<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidades extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'entities';

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
    protected $fillable = ['id', 'name', 'entities_id', 'completename', 'comment', 'level', 'state', 'country', 'phonenumber', 'email', 'regional'];

}
