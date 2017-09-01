<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Logs;

class LogsController extends Controller
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
        $this->usuario = Logs::find($route->getParameter('configuracion_logs'));
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
        $logs = []; // Logs::all();
        return view('configuracion.logs.admin', compact('logs'));
    }

}
