<div class="item form-group" id="entidad">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('id', 'Entidad', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
       <div class="demo plugin-demo jstree jstree-2 jstree-default" id="jstree">
        </div>
        {!! Form::hidden('entidad', null,['id'=>'entida']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group" id="ticket">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('id', 'Ticket<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!!Form::text('id', null,['required', 'class'=>'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('id', 'Fecha<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!!Form::text('fecha', \Carbon\Carbon::now()->toDateString(),['id'=>'ano','required', 'class'=>'form-control input-daterange-datepicker'])!!} 
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group" id="ticket">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('id', 'Tecnico<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!! Form::select('tecnicos[]', ["all"=>"Todos los tecnicos"]+$tecnicos, null, ['multiple','required','class'=>'form-control select2 select2-multiple']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('profiles_id', 'Tipo de archivo<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
     <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-download"></i></div>
        {!! Form::select('tipo', [""=>"Seleccione una opción"]+config('domains.Files'), null, ['required','class'=>'form-control']) !!}
        </div>
        <div class="help-block with-errors">
        </div>
    </div>
</div>