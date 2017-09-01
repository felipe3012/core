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
      <select id="recursive" name="entities_id">
@foreach($entidades as $option)
            <option value="{{$option->id}}"  @if($option->entities_id>-1) data-parent="{{$option->entities_id}}" @endif 
            @if(isset($entidad))@if($entidad->entities_id == $option->id ) selected @endif @endif>{{$option->name}}</option>
            @endforeach
        </select>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('regional', 'Regional<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
     {!! Form::select('regional', [""=>"Seleccione una opción"]+config('domains.Regionales'), null, ['required','class'=>'form-control','id'=>'departamentos']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('state', 'Departamento<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
     {!! Form::select('state', [""=>"Seleccione una opción"]+$departamentos, null, ['required','class'=>'form-control','id'=>'departamentos']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('country', 'Municipio<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
      {!! Form::select('country', [""=>"Seleccione una opción"]+$municipios, null, ['required', 'class'=>'form-control','id'=>'municipios']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('email', 'Correo<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
          {!!Form::text('email', null,['class'=>'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
     {!!Html::decode(Form::label('phonenumber', 'Telefono<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
    {!!Form::text('phonenumber', null,['class'=>'form-control'])!!}
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
        {!!Form::textarea('comment', null,['class'=>'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
</div>
