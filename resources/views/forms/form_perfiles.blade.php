{!! Form::hidden('permisos', null, ['id'=>'permisos']) !!}

{!! Form::hidden('usuario', 1, []) !!}

<div class="item form-group">
    {!!Html::decode(Form::label('name', 'Nombre<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('name', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('comment', 'Descripción<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::textarea('comment', null,['class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>