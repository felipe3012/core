<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mantenimientos;
use Illuminate\Routing\Route;
use Session;

class MantenimientosController extends Controller
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
        $this->mantenimientos = Mantenimientos::find($route->getParameter('configuracion_mantenimiento'));
        $this->notFound($this->mantenimientos);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          if ($this->security(35)) {
        $mantenimientos = Mantenimientos::all();
        return view('configuracion.mantenimiento.admin', compact('mantenimientos'));}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         if ($this->security(35)) {
        $filebat = 'backup.bat';
        $dump    = 'cd ' . env('DUMP_PATH', "C:/Program Files/PostgreSQL/9.5/bin/");
        $cmd     = $dump . " \n";
        $path    = substr(base_path(''), 0, -4);
        $name    = env('DB_DATABASE', 'mysql') . '_' . date('y-m-d') . '.sql';
        $ruta    = $path . $name;
        $cmd .= 'mysqldump --user=' . env('DB_USERNAME', 'root') . '  --password=' . env('DB_PASSWORD', '') . ' --host=' . env('DB_HOST', '127.0.0.1') . ' --port=' . env('DB_PORT', '3306') . ' ' . env('DB_DATABASE', 'mysql') . '  --result-file="' . $ruta . '"';

        $nuevoarchivo = fopen($filebat, "w+");
        fwrite($nuevoarchivo, $cmd);
        fclose($nuevoarchivo);
        $salida = exec($filebat);
        $man    = Mantenimientos::create(['name' => $name]);
        if ($man) {
             $this->eventsStore('0', 'Backup', 'nuevo', 'Backup '.$name.' creada por '.Auth::user()->username);
            Session::flash('message-success', 'Backup ' . $name . ' creado correctamente');
        } else {
            $this->eventsStore('0', 'Backup', 'nuevo', 'Error al crear backup '.$name.' intentado por '.Auth::user()->username);
            Session::flash('message-success', 'Error al generar backup');
        }
        return $this->retorno("configuracion_mantenimiento");}
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
         if ($this->security(35)) {
        $man    = Mantenimientos::find($id);
        $nombre = $man->name;
        exec('del /Q *.bat*');
        exec('del /Q ' . $nombre);
        if (Mantenimientos::destroy($id)) {
            $this->eventsStore('0', 'Backup', 'eliminar', 'Backup '.$name.' eliminado por '.Auth::user()->username);
            Session::flash('message-success', 'Backup ' . $nombre . ' eliminado correctamente');
        } else {
            $this->eventsStore('0', 'Backup', 'eliminar', 'Error al eliminar backup '.$name.' intentado por '.Auth::user()->username);
            Session::flash('message-error', 'Error al eliminar backup ' . $nombre);
        }
        return $this->retorno("configuracion_mantenimiento");}
    }
}
