@extends('layouts.base')
@section('title','Perfiles | Administrar')
@section('name',' <i class="fa fa-users"></i> Perfiles')
@section('breadcrumb','<li>Administración</li><li>Perfiles</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Listado de perfiles <div class="box-tools pull-right form-inline hidden-xs">
             @if(in_array(19, Auth::user()->permisos()))
            {!!Html::decode(link_to_route('administracion_perfiles.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> Nuevo</button>',[],['class'=>'','title'=>'Nuevo perfil','data-icon'=>'fa fa-plus']))!!}
            @endif
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead> 
                <tr>
                    <th>Nombre</th>
                    <th>N° Usuarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($perfiles as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->nuser}}</td>
                    <td>
                     @if(in_array(20, Auth::user()->permisos()))
  {!!Html::decode(link_to_route('administracion_perfiles.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'','title'=>'Editar perfil','data-icon'=>'fa fa-edit']))!!}
  @endif
   @if(in_array(21, Auth::user()->permisos()))
  {!!Html::decode(link_to_route('perfil','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->name],['class'=>'msgbox','title'=>'Eliminar perfil','data'=>'Perfil: '.$data->name]))!!}
  @endif
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
