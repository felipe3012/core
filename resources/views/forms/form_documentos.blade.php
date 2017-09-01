<div class="row">
        <div class="col-md-12">
          <div class="white-box">
           <h3 class="box-title"></h3>
          @if(empty($incidencia->solution) || empty($incidencia->closedate) || $incidencia->status != 6)
{!!Form::open(['route'=>'incidencias_documentos','method'=>'POST','name'=>'document','id'=>'document','data-toggle'=>'validator','class'=>'form-horizontal','files'=>true])!!}           
    <div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('file', 'Archivo<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        {!!Form::file('files', ['id'=>'files','required', 'class'=>'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
      <button id="btn-documentos" type="button" class="btn btn-sm btn-success btn-outline">Cargar</button>
    </div>
</div>
{!!Form::close()!!}
@endif
<table class="table table-bordered table-responsive table-striped table-hover">
    <thead>
        <tr>
         <td>Nombre</td>
        <td>Usuario</td>
        <td>Fecha</td>
        <td>Acción</td>
        </tr>
    </thead>
    <tbody id="doc">
       @include('incidencias.component.documentos')
    </tbody>
</table>
</div>
</div>
</div>
