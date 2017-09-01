  <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recuperar Contraseña</h3>
            <p class="text-muted">Ingresa tu email y te enviaremos las instrucciones </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
           {!! Form::email('email', null, ['required','class'=>'form-control','placeholder'=>'Email']) !!}
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
           <button class="btn btn-sm btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Restablecer</button>
          </div>
        </div>