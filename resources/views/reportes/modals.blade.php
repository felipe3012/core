@extends('layouts.form')
@section('content')
{!!Form::open(['route'=>'incidencias.store','method'=>'POST','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal','files'=>true])!!}
@include('forms.form_reportes')
@if($id==1)
{!! Form::hidden('reporte', 'xtenico', []) !!}
@endif
@if($id==2)
{!! Form::hidden('reporte', 'general', []) !!}
@endif
@if($id==3)
{!! Form::hidden('reporte', 'incidencia', []) !!}
@endif
@if($id==4)
{!! Form::hidden('reporte', 'acuerdo', []) !!}
@endif
@if($id==5)
{!! Form::hidden('reporte', 'usurios', []) !!}
@endif
{!!Form::close()!!}
<div align="center" class="form-group col-md-12">
    <button class="btn btn-sm btn-success" id="btsubmit" type="submit">
        Descargar
    </button>
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}reportes'" type="button">
        <i class="fa fa-close">
        </i>
        Cancelar
    </button>
</div>
@stop
@section('script')
<script type="text/javascript">
    var id = <?php echo $id; ?>;
if(id!="3"){
   $('#ticket').hide();
   $('#entidad').show();
}else{
  $('#entidad').hide();
}
   $(function () {
        $('#jstree').jstree({'plugins':["sort"], 'core' : {
            'data' : [<?php echo $raiz; ?> ]              }});
                    });

$('#jstree').on('changed.jstree', function (e, data) {
    var i, j, r = [];
    for(i = 0, j = data.selected.length; i < j; i++) {
      r.push(data.instance.get_node(data.selected[i]).text);
    }
   $('#entida').val(r.join(', '));
  })
</script>
@stop
