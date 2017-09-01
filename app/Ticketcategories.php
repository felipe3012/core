<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticketcategories extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ticketcategories';

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
    protected $fillable = ['id', 'entities_id', 'is_recursive', 'ticketcategories_id', 'name', 'completename', 'comment', 'level', 'knowbaseitemcategories_id', 'users_id', 'groups_id', 'ancestors_cache', 'sons_cache', 'is_helpdeskvisible'];
}
