<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickettasks extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickettasks';

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
    protected $fillable = ['groups_id_tech','date_creation','date_mod','id','tickets_id','taskcategories_id','date','users_id','content','is_private','actiontime','begin','end','state','users_id_tech'];
}

