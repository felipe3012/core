<div class="row">
        <div class="col-md-12">
          <div class="white-box">
           <h3 class="box-title"></h3>
<table class="table table-bordered table-responsive table-striped table-hover">
    <thead>
        <tr>
        <td>Fecha</td>
        <td>Usuario</td>
        <td>Campo</td>
        <td>Evento</td>
        </tr>
    </thead>
    <tbody>
        @foreach($logs as $data)
        <tr>
            <td>{{$data->date_mod}}</td>
            <td>{{$data->user_name}}</td>
            <td>{{$data->id_search_option}}</td>
            <td>{{$data->new_value}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>