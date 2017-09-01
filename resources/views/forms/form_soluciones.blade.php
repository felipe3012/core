
<div class="row">
        <div class="col-md-12">
          <div class="white-box">
           <h3 class="box-title"></h3>
           @if(empty($incidencia->solution) || empty($incidencia->closedate) || $incidencia->status != 6)
    <div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('solucion', 'Solución<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        {!!Form::textarea('solucion', null,['required', 'class'=>'form-control','placeholder'=>'Escriba su solución','rows'=>'4'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
      <buttonc id="btn-solucion" class="btn btn-sm btn-success btn-outline">Solucionar</button>
    </div>
    <br/><br/><br/><br/>
</div>
@endif
 @if(!empty($incidencia->solution))
{!! Form::textarea('solution', $incidencia->solution, ['readonly','class'=>'form-control']) !!}
 @endif
</div>
</div>
</div>