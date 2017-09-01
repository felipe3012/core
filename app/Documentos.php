<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    //
      /**
     * [$table description]
     * @var string
     */
    protected $table = 'documents';

    /**
     * [$primaryKey description]
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * [$fillable description]
     * @var array
     */
    protected $fillable = ['date_creation', 'tag', 'is_blacklisted', 'id', 'entities_id', 'is_recursive', 'name', 'filename', 'filepath', 'documentcategories_id', 'mime', 'date_mod', 'comment', 'is_deleted', 'link', 'users_id', 'tickets_id', 'sha1sum'];
}



