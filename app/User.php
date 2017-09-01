<?php

namespace App;

use App\Entidades;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Auth;

class User extends Model implements AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

/**
 * [$table description]
 * @var string
 */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'username', 'password', 'phone', 'picture', 'realname', 'firstname', 'email', 'locations_id', 'is_active', 'comment', 'profiles_id', 'entities_id', 'usertitles_id', 'usercategories_id', 'is_tecnico'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

/**
 * [setPasswordAttribute description]
 * @param [type] $param [description]
 */
    public function setPasswordAttribute($param)
    {
        if (!empty($param)) {
            $this->attributes['password'] = \Hash::make($param);
        }
    }

/**
 * [perfil description]
 * @return [type] [description]
 */
    public function perfil()
    {
        $nombre = Perfiles::select('name')->where('id', '=', $this->attributes['profiles_id'])->get();
        return $nombre[0]->nombre;
    }

    /**
     * [entidad description]
     * @return [type] [description]
     */
    public function entidad()
    {
        $nombre = "";
        $entity = User::select('entities_id', 'entities_select')->where('id', $this->attributes['id'])->get();
        if (count($entity) > 0) {
            if (!empty($entity[0]->entities_select)) {
                $id = $entity[0]->entities_select;
            } else {
                $id = $entity[0]->entities_id;
            }
        }
        $name = Entidades::select('completename')->where('id', $id)->get();
        if (count($name) > 0) {
            $nombre = $name[0]->completename;
        }
        return $nombre;
    }

/**
 * [setPictureAttribute description]
 * @param [type] $foto [description]
 */
    public function setPictureAttribute($foto)
    {
        if (!empty($foto)) {
            $this->attributes['picture'] = Carbon::now()->second . $foto->getClientOriginalName();
            $name                        = Carbon::now()->second . $foto->getClientOriginalName();
            \Storage::disk('perfiles')->put($name, \File::get($foto));
        }
    }


/**
 * [permisos description]
 * @return [type] [description]
 */
    public function permisos()
    {
        $permisos        = [];
        $funcionalidades = Permisos::where('perfil', Auth::user()->profiles_id)->get();
        if (count($funcionalidades) > 0) {
            foreach ($funcionalidades as $value) {
                array_push($permisos, $value->funcionalidad);
            }
        }
        return $permisos;
    }

}
