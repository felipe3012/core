<div class="col-md-6">
<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('username', 'Usuario<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
     <div class="input-group">
        <div class="input-group-addon"><i class="ti ti-user"></i></div>
        {!!Form::text('username', null,['required', 'class'=>'form-control'])!!}
         </div>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('realname', 'Nombre<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!!Form::text('realname', null,['required', 'class'=>'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('firstname', 'Apellido<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!!Form::text('firstname', null,['required', 'class'=>'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('email', 'Correo<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
     <div class="input-group">
          <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
        {!!Form::text('email', null,['required', 'class'=>'form-control'])!!}
          </div>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('phone', 'Telefono', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
     <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
        {!!Form::text('phone', null,['required', 'class'=>'form-control'])!!}
        </div>
        <div class="help-block with-errors">
        </div>
    </div>
</div>
<br/>
<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('usertitles_id', 'Cargo<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!! Form::select('usertitles_id', [""=>"Seleccione una opción"]+$titulos, null, ['required','class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('profiles_id', 'Perfil<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
     <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-users"></i></div>
        {!! Form::select('profiles_id', [""=>"Seleccione una opción"]+$perfiles, null, ['required','class'=>'form-control']) !!}
        </div>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('picture', 'Foto', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
     <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-file"></i></div>
        {!!Form::file('picture', ['class'=>'form-control'])!!}
        </div>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

</div>

<div class="col-md-6">
<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('password', 'Contraseña', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
     <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
        {!!Form::password('password', ['required', 'class'=>'form-control','id'=>'password'])!!}
        </div>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('cc', 'Confirmar Contraseña', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
        {!!Form::password('cc', ['id'=>'cc','required', 'class'=>'form-control'])!!}
        </div>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('is_active', 'Activar<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!! Form::select('is_active', [""=>"Seleccione una opción"]+config('domains.Estados'), null, ['required','class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('usercategories_id', 'Categoria<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!! Form::select('usercategories_id', [""=>"Seleccione una opción"]+$categorias, null, ['required','class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('entities_id', 'Entidad<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <select id="recursives" name="entities_id">
          @foreach($entidad as $option)
            <option value="{{$option->id}}"  @if(($option->entities_id)>-1) data-parent="{{$option->entities_id}}" @endif
            @if(isset($usuario))  @if($usuario->entities_id == $option->id ) selected @endif  @endif>{{$option->name}}</option>
            @endforeach
        </select>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

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