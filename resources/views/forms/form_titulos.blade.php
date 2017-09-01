<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('name', 'Nombre<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!!Form::text('name', null,['required', 'class'=>'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('comment', 'Descripción<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!!Form::textarea('comment', null,['class'=>'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
