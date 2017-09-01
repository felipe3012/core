<div class="col-md-6">
<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('nombre', 'Nombre<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!!Form::text('name', null,['required', 'class'=>'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('entities_id', 'Raiz<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!! Form::select('entities_id', [""=>"Seleccione una opción"]+$entidades, null, ['class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
    {!!Html::decode(Form::label('','<h3>Visible en una incidencia</h3><span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
     <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('entities_id', 'Autor<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!! Form::select('entities_id', config('domains.Afirmaciones'), null, ['class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
      <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('entities_id', 'Asignado a<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!! Form::select('entities_id', config('domains.Afirmaciones'), null, ['class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
      <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('entities_id', 'Notificar<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!! Form::select('entities_id', config('domains.Afirmaciones'), null, ['class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
      <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('entities_id', 'Contener Elementos<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!! Form::select('entities_id', config('domains.Afirmaciones'), null, ['class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
      <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('entities_id', 'Usuarios<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!! Form::select('entities_id', config('domains.Afirmaciones'), null, ['class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
</div>

<div class="col-md-6">
<div class="item form-group">
 <div class="col-md-12 col-sm-12 col-xs-12">
    {!!Html::decode(Form::label('comment', 'Comentario<span class="required">  </span>', ['class' => 'control-label']))!!}
    </div>
 <div class="col-md-12 col-sm-12 col-xs-12">
        {!!Form::textarea('comment', null,['required', 'class'=>'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
</div>