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
            labels: ['GRE1','SON1','SBE1'],
            datasets: [{ 
            data: [7,8,7.5],
            label: 'Blok 1',
            borderColor: "#3e95cd",
            fill: false
        }]},

        options: {
            title: {
            display: true,
            text: 'Progress'
            },

            scales: {
					yAxes: [{
						ticks: {
							suggestedMin: 0,
							suggestedMax: 10
						}
                    }]
            }   
        }
                
    });
</script>
@endpush