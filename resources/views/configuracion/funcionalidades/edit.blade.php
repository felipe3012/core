@extends('layouts.base')
@section('title','Funcionalidades | Editar')
@section('name',' <i class="fa fa-users"></i> Funcionalidades')
@section('breadcrumb','<li>Configuración</li><li>Funcionalidades</li><li class="active">Editar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Editar funcionalidad <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('configuracion_funcionalidades.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> Nueva</button>',[],['class'=>'','title'=>'Nueva funcionalidad','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
{!!Form::model($funcionalidad,['route'=>['configuracion_funcionalidades.update',$funcionalidad->id],'method'=>'PUT','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
@include('forms.form_funcionalidades')
<br/>
<div align="center" class="form-group">
    {!!Form::submit('Actualizar',['class'=>'btn btn-sm btn-primary','id'=>'send'])!!}
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}configuracion_funcionalidades'" type="button">
        Cancelar
    </button>
</div>
</div>
</div>
</div>
{!!Form::close()!!}
@stop
