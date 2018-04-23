@extends('layouts.stats')

@section('tbody')

<tbody>
     @foreach($results1 as $row)
        <tr>
            <td>{{$row->course}}</td>
            <td>{{$row->grade}}</td>
            <td>{{$row->ec}}</td>    
        </tr>
    @endforeach
</tbody>

@endsection

@push('js')
<script>
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: ['GRE1','SAN1','SBE1'],
            datasets: [{ 
            data: [7,6,9],
            label: 'BLOK 1',
            borderColor: "#3e95cd",
            fill: false
        }
        ]
  },
  options: {
    title: {
      display: true,
      text: 'Progress'
    }
  }
});
</script>
@endpush