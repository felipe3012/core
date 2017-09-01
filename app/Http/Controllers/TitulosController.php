<?php

namespace App\Http\Controllers;

use App\Cargos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Session;

class TitulosController extends Controller
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
        $this->titulo = Cargos::find($route->getParameter('administracion_titulos'));
        $this->notFound($this->titulo);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ($this->security(13)) {
            $titulos = Cargos::all();
            return view('administracion.titulos.admin', compact('titulos'));}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if ($this->security(14)) {
            return view('administracion.titulos.new');}
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
        if ($this->security(14)) {
            if (Cargos::create($request->all())) {
                $this->eventsStore('0', 'Titulos', 'nuevo', 'Titulo '.$request['nombre'].' creado por '.Auth::user()->username);
                Session::flash('message-success', 'titulo ' . $request['nombre'] . ' creado correctamente');
            } else {
                $this->eventsStore('0', 'Titulos', 'nuevo', 'Error al crear titulo '.$request['nombre'].' intentado por '.Auth::user()->username);
                Session::flash('message-error', 'Error al crear titulo' . $request['nombre']);
            }
            return $this->retorno("administracion_titulos");}
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
        if ($this->security(15)) {
            $titulos = $this->titulo;
            return view('administracion.titulos.edit', compact('titulos', 'titulopadre'));}
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
        if ($this->security(15)) {
            $this->titulo->fill($request->all());
            if ($this->titulo->save()) {
                 $this->eventsStore('0', 'Titulos', 'edicion', 'Titulo '.$request['nombre'].' creado por '.Auth::user()->username);
                Session::flash('message-success', 'titulo ' . $request['nombre'] . ' actualizado correctamente');
            } else {
                  $this->eventsStore('0', 'Titulos', 'edicion', 'Error al editar titulo '.$request['nombre'].' intentado por '.Auth::user()->username);
                Session::flash('message-error', 'Error al actualizar titulo' . $request['nombre']);
            }

            return $this->retorno("administracion_titulos");
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
        if ($this->security(16)) {

        }
    }
}
