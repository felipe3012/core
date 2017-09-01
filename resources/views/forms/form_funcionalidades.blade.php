<div class="item form-group">
    {!!Html::decode(Form::label('nombre', 'Nombre<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('nombre', null,['required', 'class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('icono', 'Icono', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('icono', null,['class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>


<div class="item form-group">
    {!!Html::decode(Form::label('padre', 'Padre',  ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
      
        <select id="recursives" name="padre">
          @foreach($funcionalidades as $option)
            <option value="{{$option->id}}"  @if(($option->padre)>0) data-parent="{{$option->padre}}" @endif
            @if(isset($funcionalidad))  @if($funcionalidad->padre == $option->id ) selected @endif  @endif>{{$option->nombre}}</option>
            @endforeach
        </select>
        <div class="help-block with-errors">
        </div>
    </div>
</div>