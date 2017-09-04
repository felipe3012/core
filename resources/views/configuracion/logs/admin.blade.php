@extends('layouts.base')
@section('title','logs | Administrar')
@section('name',' <i class="fa fa-users"></i> Logs')
@section('breadcrumb','<li>Configuración</li><li>logs</li><li class="active">Administrar</li>')
@section('content')

<div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title "><?php $show = true; $data = 'logs'; $paginate   = $logs;?> 
            @include('inc.paginate')
            </h3>
            <table class="tablesaw table table-striped table-condensed table-responsive table-hover table-bordered center"  data-tablesaw-mode="swipe">
            <thead>
                <tr>
                    <th style="text-align: center;">Id Ticket</th>
                    <th style="text-align: center;">Tipo de Evento</th>
                    <th style="text-align: center;">Servicio</th>
                    <th style="text-align: center;">Fecha Creado</th>
                    <th style="text-align: center;">Mensaje</th>
                </tr> 
            </thead>
            <tbody>
            @foreach($logs as $data)
                <tr>
                    <td>{{$data->items_id}}</td>
                    <td>{{$data->type}}</td>
                    <td>{{$data->service}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>{{$data->message}}</td>
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