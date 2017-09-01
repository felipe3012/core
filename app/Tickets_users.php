<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets_users extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickets_users';

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
    protected $fillable = ['id', 'tickets_id', 'users_id', 'type', 'use_notification', 'alternative_email'];
}
