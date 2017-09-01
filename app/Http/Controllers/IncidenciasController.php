<?php

namespace App\Http\Controllers;

use App\Documentos;
use App\Entidades;
use App\Http\Controllers\Controller;
use App\Itilcategories;
use App\Ticketfollowups;
use App\Tickets;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Session;
use App\Logs;
use Auth;

class IncidenciasController extends Controller
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
        $this->incidencias = Tickets::find($route->getParameter('incidencias'));
        $this->notFound($this->incidencias);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $paginate = "5";

        if (Session::has('page')) {
            $request['page'] = Session::get('page');
            Session::forget('page');
        }

        $sql = "";
        if (Session::has('campo') && Session::has('parametro')) {
            if (Session::get('indicador') == "like") {
                $sql .= " tickets." . Session::get('campo') . " " . Session::get('indicador') . " '%" . Session::get('parametro') . "%'";
            } else {
                $sql .= " tickets." . Session::get('campo') . " " . Session::get('indicador') . " " . Session::get('parametro');
            }
            Session::forget('campo', 'parametro', 'parametro');
        }

        $entidades  = Entidades::lists('completename', 'id')->toArray();
        $categorias = Itilcategories::lists('completename', 'id')->toArray();

        $incidencias = Tickets::select('e.name as entidad', 'tickets.id', 'tickets.name', 'tickets.content', 'tickets.solution', 'tickets.closedate', 'tickets.created_at', 'a.firstname as a', 'a.realname as aa', 'b.firstname as b', 'b.realname as bb', 't.completename', 'e.completename as entidad', 'tickets.status')
            ->leftjoin('entities as e', 'e.id', '=', 'tickets.entities_id')
            ->leftjoin('users as a', 'a.id', '=', 'tickets.users_id_recipient')
            ->leftjoin('itilcategories as t', 't.id', '=', 'tickets.itilcategories_id')
            ->leftjoin('users as b', 'b.id', '=', 't.users_id')->consulta($sql)->orderBy('tickets.id', 'desc')->paginate($paginate);

        return view('incidencias.admin', compact('incidencias', 'entidades', 'categorias'));
    }

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        //
        $categorias = Itilcategories::all();
        $usuarios   = User::where('is_tecnico', 1)->lists('realname', 'id')->toArray();
        $entidad    = Entidades::all();
        return view('incidencias.new', compact('categorias', 'usuarios', 'entidad'));
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
          $request['status'] = 1;
        $incidencias = Tickets::create($request->all());
        if ($incidencias) {
             $this->eventsStore($incidencias->id, 'Incidencia', 'nuevo', 'Incidencia '.$incidencias->id.' creada por '.Auth::user()->username);
            Session::flash('message-success', 'Incidencia ' . $request['nombre'] . ' creado correctamente');
        } else {
             $this->eventsStore('0', 'Incidencia', 'nuevo', 'Error al crear incidencia '.$request['name'].' intentada por '.Auth::user()->username);
            Session::flash('message-error', 'Error al crear incidencia' . $request['nombre']);
        }
        return $this->retorno("incidencias");
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
        return redirect('/');
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
        return redirect('/');
    }

    /**
     * Metodo para realizar paginación
     *
     * @return \Illuminate\Http\Response
     */
    public function scope($campo, $parameter)
    {
        //
        if ($campo != 0 || $parameter != 0) {
            Session::put('indicador', 'like');
            if ($campo == "id" || $campo == "name") {
                Session::put('indicador', '=');
            }
            Session::put('campo', $campo);
            Session::put('parametro', $parameter);}
        return redirect('/');
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
        $incidencia   = $this->incidencias;
        $documentos   = Documentos::select('documents.id', 'documents.filename', 'documents.filepath', 'documents.created_at', 'users.realname as user_id', 'firstname')->leftjoin('users', 'users.id', '=', 'documents.users_id')->where('tickets_id', $incidencia->id)->get();
        $categorias   = Itilcategories::all();
        $usuarios     = User::where('is_tecnico', 1)->lists('realname', 'id')->toArray();
        $entidad      = Entidades::all();
        $logs         = Logs::where('items_id', $incidencia->id)->Get();
        $seguimientos = Ticketfollowups::select('content', 'realname as user_id', 'ticketfollowups.created_at')->where('tickets_id', $id)->join('users', 'users.id', '=', 'ticketfollowups.users_id')->orderBy('ticketfollowups.id', 'created_at')->get();
        return view('incidencias.edit', compact('categorias', 'incidencia', 'usuarios', 'entidad', 'seguimientos', 'documentos','logs'));
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
        $this->incidencias->fill($request->all());
        if ($this->incidencias->save()) {
             $this->eventsStore($id, 'Incidencia', 'edicion', 'Incidencia '.$request['ticket'].' editada por '.Auth::user()->username);
            Session::flash('message-success', 'Incidencia ' . $request['nombre'] . ' actualizado correctamente');
        } else {
            $this->eventsStore($id, 'Incidencia', 'edicion', 'Error al editar incidencia '.$request['ticket'].' intentado por '.Auth::user()->username);
            Session::flash('message-error', 'Error al actualizar incidencia' . $request['nombre']);
        }
        return $this->retorno("incidencias");
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
        if (Tickets::destroy($id)) {
            Session::flash('message-success', 'Incidencia ' . $nombre . ' eliminado correctamente');
        } else {
            Session::flash('message-error', 'Error al eliminar incidencia' . $nombre);
        }
        return $this->retorno("incidencias");
    }

/**
 * [seguimiento description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
    public function seguimiento($id)
    {
        $seguimientos = Ticketfollowups::select('content', 'realname as user_id', 'ticketfollowups.created_at')->where('tickets_id', $id)->join('users', 'users.id', '=', 'ticketfollowups.users_id')->orderBy('ticketfollowups.id', 'created_at')->get();
        return view('incidencias.seguimiento', compact('seguimientos'));
    }

    /**
     * [nuevo_seguimiento description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function nuevo_seguimiento(Request $request)
    {
        if ($request->ajax()) {
            $seguimiento = Ticketfollowups::create($request->all());
            if ($seguimiento) {
                $seguimientos = Ticketfollowups::select('content', 'realname as user_id', 'ticketfollowups.created_at')->where('tickets_id', $request['tickets_id'])->join('users', 'users.id', '=', 'ticketfollowups.users_id')->orderBy('ticketfollowups.id', 'created_at')->get();
                return response()->json(view('incidencias.component.seguimiento', compact('seguimientos'))->render());
            } else {
                abort(404);
            }
        }
    }

    /**
     * [solucion description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function nueva_solucion(Request $request)
    {
        if ($request->ajax()) {
            $solution = Tickets::find($request['id']);
            $date     = Carbon::now()->toDateTimeString();
            $sol      = DB::Update("UPDATE tickets SET closedate = ?, users_id_lastupdater = ? , solution = ?, status = ? WHERE id = ?", [$date, $request['users_id_lastupdater'], $request['solution'], 6, $request['id']]);
            if ($sol) {
                return response()->json("ok");
            } else {abort(404);}
        }
    }

    /**
     * [nuevo_documento description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function nuevo_documento(Request $request)
    {
        if ($request->ajax()) {
            //obtenemos el campo file definido en el formulario
            $file = $request->file('files');
            //obtenemos el nombre del archivo
            $nombre              = $file->getClientOriginalName();
            $name                = explode(".", $nombre);
            $extencion           = $file->getClientOriginalExtension();
            $type                = $file->getMimeType();
            $ruta                = strtoupper($extencion) . "/" . Carbon::now()->second . $nombre;
            $request['mime']     = $type;
            $request['filename'] = $name[0];
            $request['filepath'] = $ruta;
            $request['name']     = "Documento de incidencia " . $request['tickets_id'];
            //indicamos que queremos guardar un nuevo archivo en el disco local
            if (\Storage::disk('files')->put($ruta, \File::get($file))) {
                Documentos::create($request->all());
                $documentos = Documentos::select('documents.id', 'documents.filename', 'documents.filepath', 'documents.created_at', 'users.realname as user_id', 'firstname')->leftjoin('users', 'users.id', '=', 'documents.users_id')->where('tickets_id', $request['tickets_id'])->get();
                return response()->json(view('incidencias.component.documentos', compact('documentos'))->render());
            } else {
                abort(404);
            }
        }
    }
}
