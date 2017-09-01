@extends('layouts.base')
@section('title','Entidades | Administrar')
@section('name',' <i class="fa fa-users"></i> Entidades')
@section('breadcrumb','<li>Administración</li><li>Entidades</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Listado de entidades <div class="box-tools pull-right form-inline hidden-xs">
             @if(in_array(24, Auth::user()->permisos()))
            {!!Html::decode(link_to_route('administracion_entidades.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> Nueva</button>',[],['class'=>'','title'=>'Nueva entidad','data-icon'=>'fa fa-plus']))!!}
            @endif
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Raiz</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($entidades as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->completename}}</td>
                    <td>
                     @if(in_array(25, Auth::user()->permisos()))
  {!!Html::decode(link_to_route('administracion_entidades.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'','title'=>'Editar entidad','data-icon'=>'fa fa-edit']))!!}
  @endif
   @if(in_array(26, Auth::user()->permisos()))
  {!!Html::decode(link_to_route('entidad','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->name],['class'=>'msgbox','title'=>'Eliminar entidad','data'=>'Entidad: '.$data->name]))!!}
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
