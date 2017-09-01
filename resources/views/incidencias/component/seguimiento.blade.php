 @foreach($seguimientos as $data)
        <tr>
            <td>{{$data->content}}</td>
            <td>{{$data->user_id}}</td>
            <td>{{$data->created_at}}</td>
        </tr>
        @endforeach