<?php

namespace App\Http\Controllers;

use App\Funcionalidades;
use App\Http\Controllers\Controller;
use App\Perfiles;
use App\Permisos;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Session;

class PerfilesController extends Controller
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
        $this->perfiles = Perfiles::find($route->getParameter('administracion_perfiles'));
        $this->notFound($this->perfiles);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ($this->security(18)) {
            $perfiles = Perfiles::select(DB::raw("count(profiles_id) as nuser, profiles.id, profiles.name"))
                ->leftJoin('users', 'users.profiles_id', '=', 'profiles.id')
                ->groupby('profiles_id', 'profiles.id', 'profiles.name')->get();
            return view('administracion.perfiles.admin', compact('perfiles'));
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
        if ($this->security(19)) {
            $funcionalidades = $this->build_funcionalidades([]);
            return view('administracion.perfiles.new', compact('funcionalidades'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($this->security(19)) {
            $permisos = [];
            try {
                if (!empty($request['permisos'])) {
                    $permisos = explode(",", $request['permisos']);
                }
                $perfil = Perfiles::create($request->all());
                foreach ($permisos as $value) {
                    Permisos::create(['perfil' => $perfil->id, 'funcionalidad' => $value]);
                }
                 $this->eventsStore('0', 'Perfiles', 'nuevo', 'Perfil '.$request['nombre'].' creado por '.Auth::user()->username);
                Session::flash('message-success', 'Perfil ' . $request['nombre'] . ' creado correctamente');
            } catch (Exception $e) {
                 $this->eventsStore('0', 'Perfiles', 'nuevo', 'Erro al crear perfil '.$request['nombre'].' intentado por '.Auth::user()->username);
                Session::flash('message-error', 'Error al crear perfil' . $request['nombre']);
            }

            return $this->retorno("administracion_perfiles");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        if ($this->security(20)) {
            $perfil          = $this->perfiles;
            $permisos        = Permisos::where('perfil', $perfil->id)->get();
            $funcionalidades = $this->build_funcionalidades($permisos);
            return view('administracion.perfiles.edit', compact('perfil', 'funcionalidades'));
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
        if ($this->security(20)) {
            $permisos = [];
            if (!empty($request['permisos'])) {
                $permisos = explode(",", $request['permisos']);
            }

            $this->perfiles->fill($request->all());
            DB::table('permisos')->where('perfil', $this->perfiles->id)->delete();
            try {
                if ($this->perfiles->save()) {
                    foreach ($permisos as $value) {

                        Permisos::create(['perfil' => $this->perfiles->id, 'funcionalidad' => $value]);
                    }
                     $this->eventsStore('0', 'Perfiles', 'edicion', 'Perfil '.$request['name'].' editado por '.Auth::user()->username);
                    Session::flash('message-success', 'Perfil ' . $request['name'] . ' actualizado correctamente');
                }
            } catch (Exception $e) {
                 $this->eventsStore('0', 'Perfiles', 'edicion', 'Error al editar Perfil '.$request['name'].' intentado por '.Auth::user()->username);
                Session::flash('message-error', 'Error al actualizar perfil' . $request['name']);
            }

            return $this->retorno("administracion_perfiles");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $nombre)
    {
        //
        if ($this->security(21)) {
            try {
                Perfiles::destroy($id);
                DB::table('permisos')->where('perfil', $id)->delete();
                  $this->eventsStore('0', 'Perfiles', 'elimiar', 'Perfil '.$nombre.' eliminado por '.Auth::user()->username);
                Session::flash('message-success', 'Perfil ' . $nombre . ' eliminado correctamente');
            } catch (Exception $e) {
                 $this->eventsStore('0', 'Perfiles', 'elimiar', 'Error al eliminar Perfil '.$nombre.' intentado por '.Auth::user()->username);
                Session::flash('message-error', 'Error al eliminar perfil' . $nombre);
            }
            return $this->retorno("administracion_perfiles");
        }
    }

/**
 * [build_funcionalidades description]
 * @param  [type] $permisos [description]
 * @return [type]           [description]
 */
    public function build_funcionalidades($permisos)
    {
        $permiso   = [];
        $funcion   = '';
        $funciones = Funcionalidades::all();
        if (count($permisos) > 0) {
            foreach ($permisos as $values) {
                array_push($permiso, $values->funcionalidad);
            }
        }
        foreach ($funciones as $value) {
            $subfuncion = $value->padre;
            $boolean    = "false";
            if (in_array($value->id, $permiso)) {
                $boolean = "true";
            }
            if ($subfuncion == 0) {
                $subfuncion = '#';
            }
            $funcion .= '{ "id" : "' . $value->id . '", "parent" : "' . $subfuncion . '", "text" : "' . $value->nombre . '", "icon": "' . $value->icono . '","state": {"selected": ' . $boolean . '}},';
        }
        return $funcion;
    }
}
