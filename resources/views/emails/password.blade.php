@extends('layouts.form')
@section('title','Restablecer Contraseña')
@section('content')
<table class="table ">
    <thead>
        <tr>
            <th class="navbar btn-primary">
                <h2>
                    <i class="fa fa-key">
                    </i>
                    Recuperar Contraseña - ACIT
                </h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <br/>
                            <div class="form-group">
                                Si recuerdas la contraseña puedes acceder a la plataforma de invensoft en el botón "Acceder"
                            </div>
                            <div class="form-group">
                                Para continuar con el proceso de recuperación de tu contraseña sigue los siguientes pasos:
                            </div>
                            <div class="form-group">
                                <label class="badge label-primary">
                                    1
                                </label>
                                Haz click en el botón "Recuperar"
                            </div>
                            <div class="form-group">
                                <label class="badge label-primary">
                                    2
                                </label>
                                Proporciona la nueva contraseña
                            </div>
                            <div class="ln_solid">
                            </div>
                            <div class="form-group">
                                <div>
                                    <a href="{{url('/')}}">
                                        <button class="btn btn-primary" type="button">
                                            Acceder
                                        </button>
                                    </a>
                                    <a href="{{url('password/reset/'.$token)}}">
                                        <button class="btn btn-warning" type="button">
                                            Recuperar
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@stop
