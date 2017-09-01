@extends('layouts.base')
@section('title','Reportes | Administrar')
@section('name','<i class="fa fa-bar-chart fa-fw"></i> Reportes')
@section('breadcrumb','<li> Reportes </li><li class="active"> Administrar</li>')
@section('content')
{!!Form::open(['route'=>'reportes.store','method'=>'POST','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title"> Seleccione el reporte que desea generar, aplique los filtros y de click en el botón descargar</h3>
        </div>
    </div>
</div>

<div class="row">
    <a class="iframe" href="{!!url('reportes/1')!!}" title="Reporte - Incidencia x Tecnico"> <div class="col-md-3">
        <div class="white-box">
            <h3 class="box-title">                                   
                     Incidencias X Tecnico
                <div class="box-tools pull-right form-inline hidden-xs">
                </div>
            </h3>
            <i  class="fa fa-wpforms text-info fa-3x">
                </i>
        </div>
    </div> </a>
   <a class="iframe" href="{!!url('reportes/2')!!}" title="Reporte - Gestion mensual"> <div class="col-md-3">
        <div class="white-box">
            <h3 class="box-title">
              Gestión mensual plataforma 
                <div class="box-tools pull-right form-inline hidden-xs">
                </div>
            </h3>
            <i  class="fa fa-desktop text-warning fa-3x">
                </i>
        </div>
    </div></a>
 <a class="iframe" href="{!!url('reportes/3')!!}" title="Reporte - Incidencia">   <div class="col-md-2">
        <div class="white-box">
            <h3 class="box-title">
                Incidencias
                <div class="box-tools pull-right form-inline hidden-xs">
                </div>
                
            </h3>
            <i  class="fa fa-tag text-primary fa-3x">
                </i>
        </div>
    </div></a>
   <a class="iframe" href="{!!url('reportes/4')!!}" title="Reporte - Acuerdo de nivel"> <div class="col-md-2">
        <div class="white-box">
            <h3 class="box-title">
                <div class="box-tools pull-right form-inline hidden-xs">
                </div>
                Acuerdo de nivel
                
            </h3>
            <i  class="fa fa-handshake-o text-danger fa-3x">
                </i>
        </div>
    </div></a>
    <a class="iframe" href="{!!url('reportes/5')!!}" title="Reporte - Usuarios"> <div class="col-md-2">
        <div class="white-box">
            <h3 class="box-title">
                 Usuarios
                <div class="box-tools pull-right form-inline hidden-xs">
                </div>
              
            </h3>
              <i  class="fa fa-users text-success fa-3x">
                </i>
        </div>
    </div>
    </a>
</div>
{!!Form::close()!!}
@stop
