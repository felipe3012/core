@extends('layouts.base')
@section('title','Perfiles | Editar')
@section('name',' <i class="fa fa-edit"></i>Editar Perfiles')
@section('breadcrumb','<li>Administración</li><li>Perfiles</li><li class="active">Editar</li>')
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="white-box">
{!!Form::model($perfil,['route'=>['administracion_perfiles.update',$perfil->id],'method'=>'PUT','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal'])!!}
<div class="col-md-6">
@include('forms.form_perfiles')
</div>
<div class="col-md-6" align="center">
<h4>Permisos</h4>
<table class="table-bordered table-hover" width="50%">
<tr>
    <td>
        <div class="demo" id="jstree" style="text-align: center;"></div>
    </td>
</tr>
</table>

<br/><br/>
<div align="center" class="form-group">
    <button class="btn btn-sm btn-primary" id="btsubmit" type="submit">
        Actualizar
    </button>
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}administracion_perfiles'" type="button">
       <i class="fa fa-close"></i> Cancelar
    </button>
</div>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>
 </div>
 </div>
{!!Form::close()!!}
@stop
@section('script')
<script type="text/javascript">
$(document).on('click', '#btsubmit', function(event) {
    event.preventDefault();
    var data = $("#jstree").jstree("get_checked",null,true);
        console.log(data);
        $('#permisos').val(data);
        document.getElementById("btsubmit").value = "Enviando...";
        document.getElementById("btsubmit").disabled = true;
        $("#frm").submit();
});

    $(function () {
        $('#jstree').jstree({'plugins':["wholerow","checkbox"], 'core' : {
            'data' : [<?php echo $funcionalidades; ?> ]
                                                                         }
                            });
                   });
</script>
@stop