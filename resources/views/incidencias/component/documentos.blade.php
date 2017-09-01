 @foreach($documentos as $data)
        <tr>
            <td>{{$data->filename}}</td>
            <td>{{$data->firstname}} {{$data->user_id}} </td>
            <td>{{$data->created_at}}</td>
            <td><a target="_blank" href="/acit/files/{{$data->filepath}}"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></button></a></td>
        </tr>
        @endforeach