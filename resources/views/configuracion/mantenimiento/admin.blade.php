@extends('layouts.base')
@section('title','Mantenimientos | Administrar')
@section('name',' <i class="fa fa-database"></i> Mantenimientos')
@section('breadcrumb','<li>Configuración</li><li>Mantenimientos</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Listado de mantenimientos <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('configuracion_mantenimiento.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> Generar</button>',[],['class'=>'','title'=>'Nuevo backup','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($mantenimientos as $data)
                <tr>
                    <td>{{$data->name}}</td>
                     <td>{{$data->created_at}}</td>
                    <td>
                    <a href="{{asset($data->name)}}" title="Descargar backup" download="{{$data->name}}"><button class="btn btn-sm btn-primary"><i class="fa fa-download"></i></button></a>
  {!!Html::decode(link_to_route('mantenimiento','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id],['class'=>'msgbox','title'=>'Eliminar backup','data'=>'Backup: '.$data->name]))!!}
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
