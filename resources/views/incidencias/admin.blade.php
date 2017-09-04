@extends('layouts.base')
@section('title','Incidencias | Administrar')
@section('name',' <i class="fa fa-home fa-fw"></i> Incidencias')
@section('breadcrumb','<li>Soporte</li><li>Incidencias</li><li class="active">Administrar</li>')
@section('content')
{{csrf_field()}} 
 <div class="row">
        <div class="col-md-12">
          <div class="white-box">
           Lista de incidencias &nbsp;&nbsp;&nbsp; @if(in_array(2, Auth::user()->permisos())) {!!Html::decode(link_to_route('incidencias.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> Nueva</button>',[],['class'=>'','title'=>'Nueva incidencia','data-icon'=>'fa fa-plus']))!!} @endif
             <div class="box-tools pull-right form-inline hidden-xs">
                 Buscar {!! Form::select('', [""=>"Seleccione un criterio"]+config('domains.BuscarIncidencias'), null, ['id'=>'criterian','class'=>'form-control']) !!}
                  <div class="input-group">
                        {!! Form::text('', null, ['id'=>'parameter','class'=>'form-control parameter']) !!}
                        {!! Form::select('', [""=>"Seleccione una entidad"]+$entidades, null, ['id'=>'entidad','class'=>'form-control']) !!}
                        {!! Form::select('', [""=>"Seleccione una categoria"]+$categorias, null, ['id'=>'categoria','class'=>'form-control']) !!}
                         <div class="input-group-addon"><i class="fa fa-search search"></i></div>
                        </div>
             </div>
          </div>
        </div>
 </div>
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title "><?php $show = true; $data = 'incidencias'; $paginate   = $incidencias;?> 
            @include('inc.paginate')
            </h3>
            <table class="tablesaw table table-striped table-condensed table-responsive table-hover table-bordered center"  data-tablesaw-mode="swipe">
            <thead>
                <tr>
                    <th style="text-align: center;">Id</th>
                    <th style="text-align: center;">Titulo</th>
                    <th style="text-align: center;">Entidad</th>
                    <th style="text-align: center;">Categoria</th>
                    <th style="text-align: center;">Descripción</th>
                    <th style="text-align: center;">Apertura</th>
                    <th style="text-align: center;">Tecnico</th>
                    <th style="text-align: center;">Estado</th>
                    <th style="text-align: center;">Solución</th>
                    <th style="text-align: center;">Cierre</th>
                    <th style="text-align: center;">Autor</th>
                </tr>
            </thead>
            <tbody> 
            @foreach($incidencias as $data)
                <tr>
                    <td width="5%">@if(in_array(3, Auth::user()->permisos())){!!Html::decode(link_to_route('incidencias/seguimiento','<i class="fa fa-search"></i>',[$data->id],['class'=>'iframe','title'=>'Seguimiento de incidencia # '.$data->id,'data-icon'=>'fa fa-search','data'=>'1000']))!!}@endif {{$data->id}}</td>
                    <td>{!!link_to_route('incidencias.edit',$data->name,[$data->id],['title'=>'Editar incidencia'])!!}</td>
                    <td>{{$data->entidad}}</td>
                    <td>{{$data->completename}}</td>
                    <td>{{$data->content}}</td>
                    <td width="6%">{{$data->created_at}}</td>
                    <td>{{$data->b.' ' .$data->bb}}</td>
                    <td><div class="label label-table label-{{config('domains.ColorEstado')[$data->status]}}">{{config('domains.Estado')[$data->status]}}</div></td>
                     <td>{{$data->solution}}</td>
                    <td width="6%">{{$data->closedate}}</td>
                    <td>{{$data->a.' ' .$data->aa}}</td> 
                </tr>
                @endforeach
            </tbody>
            </table>
            <div>
            <?php $show = false;?>
                @include('inc.paginate')
                <br/>
                 <br/>
            </div>
          </div>
        </div>
      </div>
@stop
