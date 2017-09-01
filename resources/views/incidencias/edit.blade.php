@extends('layouts.base')
@section('title','Incidencias | Editar')
@section('name','
<i class="fa fa-edit fa-fw"></i>Editar incidencias')
@section('breadcrumb','<li>Incidencias</li><li class="active">Editar</li>
')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
            </h3>
            <ul class="nav nav-pills nav-tabs" role="tablist">
                <li class="nav-item active" role="presentation">
                    <a aria-controls="ticket" aria-expanded="true" class="nav-link active" data-toggle="tab" href="#ticket1" role="tab">
                        <span class="visible-xs">
                            <i class="fa fa-bookmark-o">
                            </i>
                        </span>
                        <span class="hidden-xs">
                            Ticket
                        </span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a aria-controls="home" aria-expanded="false" class="nav-link" data-toggle="tab" href="#home1" role="tab">
                        <span class="visible-xs">
                            <i class="fa fa-calendar-o">
                            </i>
                        </span>
                        <span class="hidden-xs">
                            Seguimiento
                        </span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a aria-controls="profile" aria-expanded="false" class="nav-link" data-toggle="tab" href="#solucion1" role="tab">
                        <span class="visible-xs">
                            <i class="fa fa-gavel">
                            </i>
                        </span>
                        <span class="hidden-xs">
                            Solución
                        </span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a aria-controls="messages" aria-expanded="false" class="nav-link" data-toggle="tab" href="#estadisticas1" role="tab">
                        <span class="visible-xs">
                            <i class="fa fa-bar-chart">
                            </i>
                        </span>
                        <span class="hidden-xs">
                            Estadisticas
                        </span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a aria-controls="settings" aria-expanded="false" class="nav-link" data-toggle="tab" href="#documentos1" role="tab">
                        <span class="visible-xs">
                            <i class="fa fa-file-text">
                            </i>
                        </span>
                        <span class="hidden-xs">
                            Documentos
                        </span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a aria-controls="settings" aria-expanded="false" class="nav-link" data-toggle="tab" href="#historico1" role="tab">
                        <span class="visible-xs">
                            <i class="fa fa-search">
                            </i>
                        </span>
                        <span class="hidden-xs">
                            Historicos
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="tab-content">
    <div class="tab-pane fade active in" id="ticket1" role="tabpanel">
        {!!Form::model($incidencia,['route'=>['incidencias.update',$incidencia->id],'method'=>'PUT','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left','files'=>true])!!}
                               @include('forms.form_incidencias')
                               {!!Form::close()!!}
    </div>
    <div class="tab-pane fade" id="home1" role="tabpanel">
        @include('forms.form_seguimientos')
    </div>
    <div class="tab-pane fade " id="solucion1" role="tabpanel">
        @include('forms.form_soluciones')
    </div>
    <div class="tab-pane fade" id="estadisticas1" role="tabpanel">
        @include('forms.form_estadisticas')
    </div>
    <div class="tab-pane fade" id="documentos1" role="tabpanel">
        @include('forms.form_documentos')
    </div>
    <div class="tab-pane fade" id="historico1" role="tabpanel">
        @include('forms.form_historicos')
    </div>
</div>
<div align="center" class="form-group col-md-12">
    {!!Form::submit('Actualizar',['class'=>'btn btn-sm btn-success','id'=>'send','form'=>'frm'])!!}
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}incidencias'" type="button">
        Cancelar
    </button>
</div>
<br/>
<br/>
@stop
@section('script')
<script type="text/javascript">
    $("#cups").hide();
    $("#file").hide();
    $("#file").removeAttr('required');
        var line3 = $.UDNZTimeline({
            "data_url": "/acit/theme/plugins/bower_components/Timeline/demo/data/branches.json",
            "container": {
                "id": "demo_3_container",
                "height": 350
            },
            "effect": $.DEFINED_EFFECT_TYPE.rotateY | $.DEFINED_EFFECT_TYPE.slide
        }).Draw().ShowNode('node_5', 500);
</script>
@stop
