@extends('layouts.stats')

@section('tbody')

<tbody>
     @foreach($results2 as $row)
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
    let test = '<?php echo "hello"; ?>';

    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: ['GRE2','SAN2','SBE2'],
            datasets: [{ 
            data: [6,5,7],
            label: test,
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