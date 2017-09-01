

        <div class="form-group ">
          <div class="col-xs-12">
          {!! Form::text('username', null, ['class'=>"form-control",'required','placeholder'=>"Usuario"]) !!}

          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
          {!! Form::password('password', ['class'=>"form-control",'required','placeholder'=>"Contraseña"]) !!}
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
            {!! Form::checkbox('remenber', null, false, ['id'=>"checkbox-signup"]) !!}
              <label for="checkbox-signup"> Recordarme </label>
            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Olvido su contraseña?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-sm btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Iniciar</button>
          </div>
        </div>

       
      
