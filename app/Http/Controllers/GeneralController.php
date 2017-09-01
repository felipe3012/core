<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Session;

class GeneralController extends Controller
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
        $this->configuraciones = configuraciones::find($route->getParameter('configuraciones'));
        $this->notFound($this->configuraciones);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $configuraciones = [];//configuraciones::all();
        return view('configuracion.general.admin', compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        $configuraciones = configuraciones::create($request->all());
        if ($configuraciones) {
            Session::flash('message-success', 'configuracion ' . $request['nombre'] . ' creado correctamente');
        } else {
            Session::flash('message-error', 'Error al crear configuracion' . $request['nombre']);
        }
        return $this->retorno("configuraciones");
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
        $this->configuraciones->fill($request->all());
        if ($this->configuraciones->save()) {
            Session::flash('message-success', 'configuracion ' . $request['nombre'] . ' actualizado correctamente');
        } else {
            Session::flash('message-error', 'Error al actualizar configuracion' . $request['nombre']);
        }
        return $this->retorno("configuraciones");
    }

}
