<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itilcategories extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'itilcategories';

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
    protected $fillable = ['id', 'entities_id', 'itilcategories_id', 'name', 'completename', 'comment', 'level', 'users_id', 'acuerdo', 'info_cups'];
}
