{!! Form::hidden('usu', Auth::user()->id,['id'=>'usu']) !!}
@if(isset($incidencia))
{!! Form::hidden('ticket', $incidencia->id,['id'=>'ticket']) !!}
@endif
@if(in_array(37, Auth::user()->permisos()))
        <div class="col-md-12">
          <div class="white-box">
           <h3 class="box-title"></h3>
<table class="table table-bordered table-responsive">
<tbody>
     <tr>
         <td>
         <div class="col-md-6">
         <div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-2">
    {!!Html::decode(Form::label('status', 'Estado <span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
   {!! Form::select('status', [""=>"Seleccione una opción"]+config('domains.Estado'), null, ['required','class' => 'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
</div>


 <div class="col-md-6">

  <div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-2">
    {!!Html::decode(Form::label('status', 'Entidad <span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
   <select id="recursives" name="entities_id_autor">
          @foreach($entidad as $option)
            <option value="{{$option->id}}"  @if(($option->entities_id)>-1) data-parent="{{$option->entities_id}}" @endif
            @if(isset($incidencia))  @if($incidencia->entities_id == $option->id ) selected @endif  @endif>{{$option->name}}</option>
            @endforeach
        </select>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

   <div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-2">
    {!!Html::decode(Form::label('status', 'Autor <span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
    {!! Form::select('users_id_recipient', [""=>"Seleccione una opción"]+$usuarios, null, ['class' => 'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>


    </div>
         </td>
     </tr>
         </tbody>
</table>
</div>
</div>
@else
{!! Form::hidden('status', null, []) !!}
{!! Form::hidden('users_id_recipient', null, []) !!}
@endif 


        <div class="col-md-12">
          <div class="white-box">
          <h3 class="box-title"></h3>
<table class="table table-bordered table-responsive">
<tbody>
     <tr>
         <td>
         <div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-2">
    {!!Html::decode(Form::label('created_at', 'Fecha de apertura <span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
    {!!Form::text('created_at', \Carbon\Carbon::now(),['id'=>'created_at','required', 'class'=>'form-control','readonly'])!!}
    </div>
        <div class="help-block with-errors">
        </div>
    </div>
</div>

         </td>
         <td>
           <div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-2">
    {!!Html::decode(Form::label('name', 'Categoria<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
        <select id="recursive" class="categories " name="itilcategories_id">
        @foreach($categorias as $option)
            <option value="{{$option->id}}"  @if($option->itilcategories_id>0) data-parent="{{$option->itilcategories_id}}" @endif
            @if(isset($incidencia))@if($incidencia->itilcategories_id == $option->id ) selected @endif @endif>{{$option->name}}</option>
            @endforeach
        </select>
        <div class="help-block with-errors">
        </div>
    </div>
</div>
         </td>
     </tr>
      <tr>
         <td>
         <div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-2">
    {!!Html::decode(Form::label('name', 'Tipo<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
     {!! Form::select('type', [""=>"Seleccione una opción"]+config('domains.Tipo'), 1, ['class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
         </td>
         <td>
         <div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-2">
    {!!Html::decode(Form::label('name', 'Fecha de vencimiento<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
      <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
    {!!Form::text('closedate', null,['id'=>'date_ven','required', 'class'=>'form-control','readonly'])!!}
    </div>
       <div class="help-block with-errors">
        </div>
    </div>
</div>
         </td>
     </tr>
     </tbody>
</table>
</div>
</div>

    <div class="col-md-12" id="cups">
        <div class="white-box">
           <h3 class="box-title">Información de codigos
          <div class="box-tools pull-right form-inline hidden-xs">
               <button class="btn btn-sm btn-default" type="button" id="add">Agregar</button>
                <button class="btn btn-sm btn-danger" type="button" id="del"><i class="fa fa-trash"></i></button>
           </div>
           </h3>
            <table class="table table-bordered" id="tabla">
                <thead>
                    <tr>
                        <td>Codigo</td>
                        <td>Nivel</td>
                        <td>Nit</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{!! Form::text('', '', ['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text('', '', ['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text('', '', ['class'=>'form-control']) !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

        <div class="col-md-12">
          <div class="white-box">
           <h3 class="box-title"></h3>
<table class="table table-bordered table-responsive">
 <tbody>
    <tr>
        <td>
            <div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-2">
    {!!Html::decode(Form::label('name', 'Titulo<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
        </td>
    </tr>

     <tr>
        <td>
            <div class="item form-group">
 <div class="col-md-2 col-sm-2 col-xs-2">
    {!!Html::decode(Form::label('content', 'Descripción<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
        {!! Form::textarea('content',  null, ['class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
        </td>
    </tr>

     <tr id="file">
        <td>
           <div class="item form-group" >
 <div class="col-md-2 col-sm-2 col-xs-2">
    {!!Html::decode(Form::label('filename', 'Archivo<span class="required">  </span>', ['class' => 'control-label']))!!}
     </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-file"></i></div>
        {!! Form::file('filename', ['class'=>'form-control']) !!}
        </div>
        <div class="help-block with-errors">
        </div>
    </div>
</div>
        </td>
    </tr>
 </tbody>
</table>
</div>
</div>


