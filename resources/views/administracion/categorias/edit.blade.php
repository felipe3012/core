@extends('layouts.base')
@section('title','Categorias | Editar')
@section('name',' <i class="fa fa-edit"></i> Editar Usuario')
@section('breadcrumb','<li>Administración</li><li>Categorias</li><li class="active">Editar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
{!!Form::model($categoria,['route'=>['administracion_categorias.update',$categoria->id],'method'=>'PUT','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal'])!!}
@include('forms.form_categorias')
<div align="center" class="form-group">
    <button class="btn btn-sm btn-primary" id="btsubmit" type="submit">
        Actualizar
    </button>
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}administracion_categorias'" type="button">
       <i class="fa fa-close"></i> Cancelar
    </button>
</div>
   </div>
    </div>
 </div>
{!!Form::close()!!}
@stop
