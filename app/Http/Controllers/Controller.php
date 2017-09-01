<?php

namespace App\Http\Controllers;

use App\Entidades;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Events;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * [Metodo para controlar el paso de parametros segun las rutas que lo solicitan]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function notFound($value)
    {
        if (!$value) {
            abort(404);
        }
    }

/**
 * [Metodo para restringir los metodos segun los permisos del usuario]
 * @param  [type] $funcion [description]
 * @return [type]          [description]
 */
    public function security($funcion)
    {
        $permisos = Auth::user()->permisos();
        if (!in_array($funcion, $permisos)) {
            abort(403);
        }
        return true;
    }

    /**
     * Metodo para cerrar ventanas emergentes y redirigir a la ruta deseada
     *
     * @return \Illuminate\Http\Response
     */
    public function retorno($ruta)
    {
        //
        $script = "<script>\n";
        $script .= "window.parent.location.href = '/acit/" . $ruta . "';\n";
        $script .= "</script>\n";
        echo $script;
    }

/**
 * [recursivo description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
    public function recursivo($id)
    {
        $aux   = "";
        $hijo  = "";
        $hijos = Entidades::where('entities_id', $id)->get();
        if (count($hijos) > 0) {
            foreach ($hijos as $key => $value) {
                $aux .= $value->id . " ,";
                $hijo = $this->recursivo($value->id);
                if (!empty($hijo)) {
                    $aux .= $hijo;
                }
            }
        }
        return $aux;
    }


     /**
     * Metodo guardar en logs
     *
     * @return \Illuminate\Http\Response
     */
    public function eventsStore($items_id, $type , $service, $message)
    {
        $evento = Events::create(['items_id' => $items_id, 'type' => $type, 'service' => $service, 'message' => $message]);
    }

    function getRealIP() {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
    }
}
