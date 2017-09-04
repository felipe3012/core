<?php

namespace App\Http\Controllers;

use App\Cargos;
use App\Entidades;
use App\Http\Controllers\Controller;
use App\Perfiles;
use App\User;
use App\Usercategories;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Session;
use Hash;
use Auth;
use Redirect;

class UsuariosController extends Controller
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => []]);
        $this->beforeFilter('@find', ['only' => ['edit', 'update']]);
    }

/**
 * [find description]
 * @param  Route  $route [description]
 * @return [type]        [description]
 */
    public function find(Route $route)
    {

        $this->usuario = User::find($route->getParameter('administracion_usuarios'));
        $this->notFound($this->usuario);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ($this->security(8)) {
            $entidad = substr($this->recursivo(Auth::user()->entities_id),0,-1);
            $usuarios = User::select('users.id', 'users.email', 'users.username', 'profiles.name as perfil', 'users.is_active', 'users.realname', 'users.firstname')->join('profiles', 'profiles.id', '=', 'users.profiles_id')->whereRaw("entities_id IN (".$entidad.")")->get();
            return view('administracion.usuarios.admin', compact('usuarios'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if ($this->security(9)) {
            $perfiles   = Perfiles::lists('name', 'id')->toArray();
            $entidad    = Entidades::all();
            $titulos    = Cargos::lists('name', 'id')->toArray();
            $categorias = Usercategories::lists('name', 'id')->toArray();
            return view('administracion.usuarios.new', compact('perfiles', 'entidad', 'titulos', 'categorias'));
        }
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        //
        if ($this->security(9)) {
            if (User::create($request->all())) {
                $this->eventsStore('0', 'Usuarios', 'nuevo', 'Usuario '.$request['username'].' creado por '.Auth::user()->username);
                Session::flash('message-success', 'Usuario ' . $request['name'] . ' creado correctamente');
            } else {
                 $this->eventsStore('0', 'Usuarios', 'nuevo', 'Error al crear usuario '.$request['username'].' intentado por '.Auth::user()->username);
                Session::flash('message-error', 'Error al crear usuario' . $request['name']);
            }
            return $this->retorno("administracion_usuarios");}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function valid(Request $request, $id)
    {
        //
        if ($request->ajax()) {
            if (Hash::check($id, Auth::user()->password)) {
                return response("ok", $httpStatusCode = 200, $headers = []);
            }
            return response($id, $httpStatusCode = 406, $headers = []);
        }
        abort(404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if ($this->security(10)) {
            $usuario    = $this->usuario;
            $perfiles   = Perfiles::lists('name', 'id')->toArray();
            $entidad    = Entidades::all();
            $titulos    = Cargos::lists('name', 'id')->toArray();
            $categorias = Usercategories::lists('name', 'id')->toArray();
            return view('administracion.usuarios.edit', compact('usuario', 'perfiles', 'entidad', 'titulos', 'categorias'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $activo = User::select('is_active')->where('id', $id)->get();
        if ($this->security(10)) {
            $this->usuario->fill($request->all());
            if ($this->usuario->save()) {
                 if ($activo[0]->is_active == $request->is_active) {
                    
                }else{
                    if($request->is_active == 1){
                        $this->eventsStore('0', 'Usuarios', 'activar', 'Usuario '.$request['username'].' activado por '.Auth::user()->username);
                    }elseif($request->is_active == 0){
                        $this->eventsStore('0', 'Usuarios', 'inactivar', 'Usuario '.$request['username'].' inactivado por '.Auth::user()->username);
                    }
                }               
                $this->eventsStore('0', 'Usuarios', 'edicion', 'Usuario '.$request['username'].' editado por '.Auth::user()->username);
                Session::flash('message-success', 'Usuario ' . $request['nombre'] . ' actualizado correctamente');
            } else {
                Session::flash('message-error', 'Error al actualizar usuario' . $request['nombre']);
                $this->eventsStore('0', 'Usuarios', 'edicion', 'Error al editar usuario '.$request['username'].' intentado por '.Auth::user()->username);
            }
            return $this->retorno("administracion_usuarios");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if ($this->security(11)) {
            $usuario = User::find($id);
            $usuario->fill(['estado' => 2]);
            if ($usuario->save()) {
                $this->eventsStore('0', 'Usuarios', 'inactivar', 'Usuario '.$request['username'].' inactivado por '.Auth::user()->username);
                Session::flash('message-success', 'Usuario ' . $usuario->nombre . ' inactivado correctamente');
            } else {
                Session::flash('message-error', 'Error al inactivar usuario ' . $usuario->nombre);
            }
            return $this->retorno("administracion_usuarios");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        //
        $usuario = User::find($id);
        $usuario->fill(['estado' => 1]);
        if ($usuario->save()) {
            Session::flash('message-success', 'Usuario ' . $usuario->nombre . ' activado correctamente');
        } else {
            Session::flash('message-error', 'Error al activar usuario ' . $usuario->nombre);
        }
        return $this->retorno("administracion_usuarios");
    }

/**
 * [change description]
 * @param  Request $request [description]
 * @return [type]           [description]
 */
    public function change(Request $request)
    {
        //
        $usuario = User::find(Auth::user()->id);
        $usuario->fill(['password' => $request['password']]);
        if ($usuario->save()) {
             $this->eventsStore('0', 'Usuarios', 'password', 'Contraseña de '.$usuario->username.' cambiada');
            Session::flash('message-success', 'Contraseña cambiada correctamente, Ingrese con su nueva contraseña');
        } else {
             $this->eventsStore('0', 'Usuarios', 'password', 'Error al cambiar contraseña de '.$usuario->username);
            Session::flash('message-error', 'Error al cambiar la contraseña');
        }

        return Redirect::to("/auth/logout");
    }

/**
 * [unique description]
 * @param  Request $request [description]
 * @param  [type]  $id      [description]
 * @return [type]           [description]
 */
    public function unique(Request $request, $id)
    {
        //
        if ($request->ajax()) {
            $usuario = User::where('email', $id)->get();
            if (count($usuario) > 0) {
                return response($id, $httpStatusCode = 406, $headers = []);
            } else {
                return response("ok", $httpStatusCode = 200, $headers = []);
            }
        }
        abort(404);

    }
}
