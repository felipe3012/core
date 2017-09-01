@extends('layouts.base')
@section('title','Categorias | Administrar')
@section('name',' <i class="fa fa-user"></i> categorias')
@section('breadcrumb','<li>Administración</li><li>Categorias</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Listado de categorias <div class="box-tools pull-right form-inline hidden-xs">
            @if(in_array(29, Auth::user()->permisos())) {!!Html::decode(link_to_route('administracion_categorias.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> Nuevo</button>',[],['class'=>'','title'=>'Nuevo categoria','data-icon'=>'fa fa-plus']))!!} @endif
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Entidad</th>
                    <th>Tecnico</th>
                    <th>Acuerdo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categorias as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->completename}}</td>
                    <td>{{$data->realname}}</td>
                    <td>{{$data->acuerdo}} dias</td>
                    <td>
                    @if(in_array(30, Auth::user()->permisos()))
  {!!Html::decode(link_to_route('administracion_categorias.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'','title'=>'Editar categoria','data-icon'=>'fa fa-edit']))!!}
  @endif
  @if(in_array(31, Auth::user()->permisos()))
  {!!Html::decode(link_to_route('categoria','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->name],['class'=>'msgbox','title'=>'Inactivar categoria','data'=>'categoria: '.$data->name]))!!}@endif
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
