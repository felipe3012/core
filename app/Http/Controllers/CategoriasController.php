<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Itilcategories;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Session;
use Auth;

class CategoriasController extends Controller
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
        $this->categoria = Itilcategories::find($route->getParameter('administracion_categorias'));
        $this->notFound($this->categoria);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ($this->security(28)) {
            $categorias = Itilcategories::select('itilcategories.id', 'itilcategories.entities_id', 'itilcategories.itilcategories_id', 'itilcategories.name', 'itilcategories.completename', 'itilcategories.comment', 'itilcategories.level', 'users.realname', 'itilcategories.acuerdo')->join('users', 'users.id', '=', 'itilcategories.users_id')->whereRaw("itilcategories.entities_id IN (" . $this->getIdEntities() . ")")->get();
            return view('administracion.categorias.admin', compact('categorias'));}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if ($this->security(29)) {
            $entidad    = $this->getEntities();
            $tecnicos   = User::where('is_tecnico', 1)->lists('realname', 'id')->toArray();
            $categorias = Itilcategories::whereRaw("itilcategories.entities_id IN (" . $this->getIdEntities() . ")")->get();
            return view('administracion.categorias.new', compact('entidad', 'tecnicos', 'categorias'));
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
        if ($this->security(29)) {
            if (empty($request['itilcategories_id'])) {
                $request['itilcategories_id'] = -1;
            }
            $u                       = Itilcategories::select(DB::Raw('max(id) as id'))->get();
            $categories              = $this->Itilcategories($request['itilcategories_id']);
            $request['completename'] = $this->arbol($categories, $request['name']);
            $request['level']        = $this->level($categories);
            $request['id']           = $u[0]->id + 1;
            if (User::create($request->all())) {
                $this->eventsStore('0', 'Categorias', 'nuevo', 'Categoria ' . $request['nombre'] . ' creada por ' . Auth::user()->username);
                Session::flash('message-success', 'categoria ' . $request['nombre'] . ' creado correctamente');
            } else {
                $this->eventsStore('0', 'Categorias', 'nuevo', 'Erro al crear categoria ' . $request['nombre'] . ' intentado por ' . Auth::user()->username);
                Session::flash('message-error', 'Error al crear categoria' . $request['nombre']);
            }
            return $this->retorno("administracion_categorias");
        }
    }

    /**
     * [entidad description]
     * @return [type] [description]
     */
    public function Itilcategories($arr)
    {
        $en = [];
        if (!empty($arr)) {
            $e = Itilcategories::where('id', $arr)->get();
            if (count($e) > 0) {
                $en = $e[0];
            }
        }
        return $en;
    }

    /**
     * [entidad description]
     * @return [type] [description]
     */
    public function level($arr)
    {
        if (!empty($arr->completename)) {
            return count(explode(">", $arr->completename));
        } else {
            return 1;
        }
    }

    /**
     * [arbol description]
     * @return [type] [description]
     */
    public function arbol($arr, $name)
    {
        if (!empty($arr->completename)) {
            return $arr->completename . " > " . $name;
        } else {
            return $name;
        }
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
        if ($this->security(30)) {
            $categoria  = $this->categoria;
            $entidad    = $this->getEntities();
            $tecnicos   = User::where('is_tecnico', 1)->lists('realname', 'id')->toArray();
            $categorias = Itilcategories::all();
            return view('administracion.categorias.edit', compact('entidad', 'categorias', 'tecnicos', 'categoria'));
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
        if ($this->security(30)) {
            if (empty($request['itilcategories_id'])) {
                $request['itilcategories_id'] = -1;
            }
            $categories              = $this->Itilcategories($request['itilcategories_id']);
            $request['completename'] = $this->arbol($categories, $request['name']);
            $request['level']        = $this->level($categories);
            $this->categoria->fill($request->all());
            if ($this->categoria->save()) {
                $this->eventsStore('0', 'Categorias', 'edicion', 'Categoria ' . $request['name'] . ' editada por ' . Auth::user()->username);
                Session::flash('message-success', 'categoria ' . $request['nombre'] . ' actualizado correctamente');
            } else {
                $this->eventsStore('0', 'Categorias', 'edicion', 'Error al editar categoria ' . $request['name'] . ' intentado por ' . Auth::user()->username);
                Session::flash('message-error', 'Error al actualizar categoria' . $request['nombre']);
            }

            return $this->retorno("administracion_categorias");
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
        if ($this->security(31)) {

        }
    }

    /**
     * [acuerdo description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function acuerdo(Request $request)
    {
        if ($request->ajax()) {
            $categoria = Itilcategories::where('id', $request['id'])->get();
            if (count($categoria) > 0) {
                $fecha = Carbon::parse($request['fecha'])->addDays($categoria[0]->acuerdo)->toDateTimeString();
                $cup   = $categoria[0]->info_cups;
            } else {
                $fecha = $request['fecha'];
                $cup   = 0;
            }
            return response()->json([$fecha, $cup]);
        }
        abort(403);
    }

}
