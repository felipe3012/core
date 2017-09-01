<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickets';

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
    protected $fillable = ['id', 'entities_id', 'name', 'created_at', 'closedate', 'solvedate', 'updated_at', 'users_id_lastupdater', 'status', 'users_id_recipient', 'requesttypes_id', 'content', 'itilcategories_id', 'type', 'solutiontypes_id', 'solution', 'vencimiento'];

/**
 * [seguimientos description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
    public static function seguimientos($id)
    {
        $segui  = Ticketfollowups::where('tickets_id', $id)->orderby('id', 'asc')->get();
        $concat = "";
        if (count($segui) > 0) {
            $concat .= $segui[0]->content . '<br/>';
        }
        return $concat;
    }

/**
 * [scopeConsulta description]
 * @param  [type] $query [description]
 * @param  [type] $sql   [description]
 * @return [type]        [description]
 */
    public function scopeConsulta($query, $sql)
    {
        if (!empty($sql)) {
            $query->whereRaw($sql);
        }
    }
}

