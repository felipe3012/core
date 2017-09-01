<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticketvalidations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ticketvalidations';

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
    protected $fillable = ['id', 'entities_id', 'users_id', 'tickets_id', 'users_id_validate', 'comment_submission', 'comment_validation', 'status', 'submission_date', 'validation_date'];
}
