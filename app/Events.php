<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

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
    protected $fillable = ['id', 'items_id', 'type', 'date', 'service', 'level', 'message'];
}
