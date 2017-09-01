@extends('layouts.base')
@section('title','logs | Administrar')
@section('name',' <i class="fa fa-users"></i> Logs')
@section('breadcrumb','<li>Configuración</li><li>logs</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Listado de logs <div class="box-tools pull-right form-inline hidden-xs">
            
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Evento</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Objeto</th>
                    <th>Objeto actualizado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($logs as $data)
                <tr>
                    <td>{{$data->nombre}}</td>
                    <td>{{$data->nombre}}</td>
                     <td>{{$data->nombre}}</td>
                    <td>{{$data->nombre}}</td>
                     <td>{{$data->nombre}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>        
        </div>
      </div>
@stop