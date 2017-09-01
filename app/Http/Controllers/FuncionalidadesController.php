<?php

namespace App\Http\Controllers;

use App\Funcionalidades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Session;

class FuncionalidadesController extends Controller
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
        $this->funcionalidad = Funcionalidades::find($route->getParameter('configuracion_funcionalidades'));
        $this->notFound($this->funcionalidad);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ($this->security(36)) {
            $funcionalidades = Funcionalidades::all();
            return view('configuracion.funcionalidades.admin', compact('funcionalidades'));
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
        if ($this->security(36)) {
            $funcionalidades = Funcionalidades::all();
            return view('configuracion.funcionalidades.new', compact('funcionalidades'));
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
        if ($this->security(36)) {
            if (empty($request['padre'])) {
                $request['padre'] = 0;
            }
            try {
                Funcionalidades::create($request->all());
                Session::flash('message-success', 'Funcionalidad ' . $request['nombre'] . ' creado correctamente');
            } catch (Exception $e) {
                Session::flash('message-error', 'Error al crear funcionalidad' . $request['nombre']);
            }
            return $this->retorno("configuracion_funcionalidades");}
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
        if ($this->security(36)) {
            $funcionalidad   = $this->funcionalidad;
            $funcionalidades = Funcionalidades::all();
            return view('configuracion.funcionalidades.edit', compact('funcionalidad', 'funcionalidades'));}
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
        if ($this->security(36)) {
            if (empty($request['padre'])) {
                $request['padre'] = 0;
            }
            $this->funcionalidad->fill($request->all());
            try {
                $this->funcionalidad->save();
                Session::flash('message-success', 'Funcionalidad ' . $request['nombre'] . ' actualizada correctamente');
            } catch (Exception $e) {
                Session::flash('message-error', 'Error al actualizar funcionalidad' . $request['nombre']);
            }
            return $this->retorno("configuracion_funcionalidades");}
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
        if ($this->security(36)) {
            try {
                Funcionalidades::destroy($id);
                Session::flash('message-success', 'Funcionalidad ' . $nombre . ' eliminada correctamente');
            } catch (Exception $e) {
                Session::flash('message-error', 'Error al eliminar funcionalidad' . $nombre);
            }
            return $this->retorno("configuracion_funcionalidades");}
    }
}
