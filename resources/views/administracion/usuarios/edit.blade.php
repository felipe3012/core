@extends('layouts.base')
@section('title','Usuarios | Editar')
@section('name',' <i class="fa fa-edit"></i> Editar Usuario')
@section('breadcrumb')
<li>Administración</li>
<li><a onclick="window.parent.location.href = '{{config('domains.Base')[0]}}administracion_usuarios'">Usuarios</a></li>
<li class="active">Editar</li>
@stop
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
{!!Form::model($usuario,['route'=>['administracion_usuarios.update',$usuario->id],'method'=>'PUT','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal'])!!}
@include('forms.form_usuarios')
<div align="center" class="form-group">
    <button class="btn btn-sm btn-primary" id="btsubmit" type="submit">
        Actualizar
    </button>
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}administracion_usuarios'" type="button">
       <i class="fa fa-close"></i> Cancelar
    </button>
</div>
   </div>
    </div>
 </div>
{!!Form::close()!!}
@stop
@section('script')
<script type="text/javascript">
  $('#password').val('');
  $('#password').removeAttr('required');
  $('#cc').removeAttr('required');
</script>
@stop