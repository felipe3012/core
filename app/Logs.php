<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'logs';

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
    protected $fillable = ['id', 'itemtype', 'items_id','itemtype_link', 'linked_action', 'user_name', 'date_mod', 'id_search_option', 'old_value', 'new_value'];

}
