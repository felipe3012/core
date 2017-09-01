<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticketfollowups extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ticketfollowups';

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
    protected $fillable = [ 'id', 'tickets_id', 'users_id', 'content'];
}
