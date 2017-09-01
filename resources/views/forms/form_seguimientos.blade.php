
<div class="row">
        <div class="col-md-12">
          <div class="white-box">
           <h3 class="box-title"></h3>
            @if(empty($incidencia->solution) || empty($incidencia->closedate) || $incidencia->status != 6)
 <div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('seguimiento', 'Seguimiento<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        {!!Form::textarea('seguimiento', null,['required'=>'seguimiento','required', 'class'=>'form-control','placeholder'=>'Escriba su solución','rows'=>'4'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
      <button type="button" id="btn-segumiento" class="btn btn-sm btn-success btn-outline">Agregar</button>
    </div>
</div>
@endif
<table class="table table-bordered table-responsive table-striped table-hover">
    <thead>
        <tr>
        <td>Seguimiento</td>
        <td>Usuario</td>
        <td>Fecha</td>
        </tr>
    </thead>
    <tbody id="segui">
       @include('incidencias.component.seguimiento')
    </tbody>
</table>
</div>
</div>
</div>