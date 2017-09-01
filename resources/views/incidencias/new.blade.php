@extends('layouts.base')
@section('title','Incidencias | Nueva')
@section('name',' <i class="fa fa-plus fa-fw"></i>Nueva incidencias')
@section('breadcrumb','<li>Incidencias</li><li class="active">Nueva</li>')
@section('content')
{!!Form::open(['route'=>'incidencias.store','method'=>'POST','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal','files'=>true])!!}
{!! Form::hidden('users_id_recipient', Auth::user()->id, []) !!}
  @include('forms.form_incidencias')
  <br/>
<div align="center" class="form-group col-md-12">
    <button class="btn btn-sm btn-primary" id="btsubmit" type="submit">
        Guardar
    </button>
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}incidencias'" type="button">
         <i class="fa fa-close"></i> Cancelar
    </button>
</div>
{!!Form::close()!!}
@stop
@section('script')
<script type="text/javascript">
	  $("#cups").hide();
</script>
@stop