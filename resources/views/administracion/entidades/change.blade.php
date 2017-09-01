@extends('layouts.form')
@section('content')
{!!Form::open(['route'=>'entidad_change','method'=>'POST','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizonta'])!!}
<div class="container">
        <div class="demo plugin-demo jstree jstree-2 jstree-default" id="jstree">
        </div>
</div>
<div align="center" class="form-group">
    <button class="btn btn-sm btn-primary" id="btsubmit" type="submit">
        Seleccionar
    </button>
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}administracion_perfiles'" type="button">
       <i class="fa fa-close"></i> Cancelar
    </button>
</div>
{!! Form::hidden('entida', null, ['id'=>'entida','required']) !!}
{!!Form::close()!!}
@stop
@section('script')
<script type="text/javascript">
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