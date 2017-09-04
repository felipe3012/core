<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Logs;
use App\Events; 
use Session;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    { 
        if ($this->security(34));
        //
        $paginate = "5";

        if (Session::has('page')) {
            $request['page'] = Session::get('page');
            Session::forget('page');
        }
 
        $logs = Events::select('id','items_id','type','created_at','service','level', 'message')->paginate($paginate);
        return view('configuracion.logs.admin', compact('logs'));
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
        Session::put('paginate', $id);
        return redirect('configuracion_logs');
    }
 
        /**
     * Metodo para realizar paginación
     *
     * @return \Illuminate\Http\Response
     */
    public function paginador($id)
    {
        //
        Session::put('page', $id);
        return redirect('configuracion_logs');
    }

}
