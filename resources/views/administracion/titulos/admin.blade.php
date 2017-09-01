@extends('layouts.base')
@section('title','titulos | Administrar')
@section('name',' <i class="fa fa-user"></i> titulos')
@section('breadcrumb','<li>Administración</li><li>titulos</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Listado de titulos <div class="box-tools pull-right form-inline hidden-xs">
             @if(in_array(14, Auth::user()->permisos()))
            {!!Html::decode(link_to_route('administracion_titulos.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> Nuevo</button>',[],['class'=>'','title'=>'Nuevo usuario','data-icon'=>'fa fa-plus']))!!}
            @endif
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($titulos as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>
           @if(in_array(15, Auth::user()->permisos()))
  {!!Html::decode(link_to_route('administracion_titulos.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'','title'=>'Editar usuario','data-icon'=>'fa fa-edit']))!!}
    @endif
   @if(in_array(16, Auth::user()->permisos()))
  {!!Html::decode(link_to_route('usuario','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->name],['class'=>'msgbox','title'=>'Inactivar usuario','data'=>'usuario: '.$data->name]))!!}    @endif
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
