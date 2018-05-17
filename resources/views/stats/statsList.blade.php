 @foreach($results as $row)
        <tr>
            <td>{{$row->course}}</td>
            <td>{{$row->grade}}</td>
            <td>{{$row->ec}}</td>    
        </tr>
 @endforeach

