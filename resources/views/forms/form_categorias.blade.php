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
    {!!Html::decode(Form::label('entities_id', 'Entidad<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <select id="recursives" name="entities_id">
<?php $i=0; ?>
          @foreach($entidad as $option)
            <option value="{{$option->id}}"  @if($i != 0) data-parent="{{$option->entities_id}}" @endif
            @if(isset($categoria))  @if($categoria->entities_id == $option->id ) selected @endif  @endif>{{$option->name}}</option>
           <?php  $i++;?>
            @endforeach
        </select>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('itilcategories_id', 'Categoria<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <select id="recursive" name="itilcategories_id">
@foreach($categorias as $option)
            <option value="{{$option->id}}"  @if($option->itilcategories_id>0) data-parent="{{$option->itilcategories_id}}" @endif
            @if(isset($categoria))@if($categoria->itilcategories_id == $option->id ) selected @endif @endif>{{$option->name}}</option>
            @endforeach
        </select>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('users_id', 'Tecnico<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
         {!! Form::select('users_id', [""=>"Seleccione una opción"]+$tecnicos, null, ['required','class'=>'form-control select']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('acuerdo', 'Acuerdo<span class="required"> * </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
        {!!Form::number('acuerdo', null,['required', 'class'=>'form-control','placeholder'=>'Dias'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
  <div class="col-md-2 col-sm-2 col-xs-12">
    {!!Html::decode(Form::label('info_cups', 'Información de cups', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-12">
       {!! Form::checkbox('info_cups', 1, null, []) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
