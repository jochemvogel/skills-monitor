@extends('adminlte::page')

@section('title', 'Stats')

@section('content')


    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Stats</strong></h3>
        </div>

        <div class="box-body">
            <div class="btn btn-primary btn-xs" id='blok1'>BLOK 1</div>
            <div class="btn btn-primary btn-xs" id='blok2'>BLOK 2</div>
            <div class="btn btn-primary btn-xs" id='blok3'>BLOK 3</div>
            <div class="btn btn-primary btn-xs" id='blok4'>BLOK 4</div>

            <div class="x_content" id="table">  
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Course name</th>
                            <th>Grade</th>
                            <th>EC</th>
                        </tr>
                    </thead>

                    <tbody id="tbody">

                    </tbody>

                </table>
            </div>

            <div class="x_content">
                <canvas id="line-chart" width="400" height="225"></canvas>
            </div>

        </div>
    </div>

@endsection

@push('js')
<script>
    //Onload function
    window.onload = function(){

        $.ajax({
            headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                type: "GET",
                url: '/getstats',
                data: {
                    'blok': '1'
                }, success: function (data) {
                    createTable(data);
                    createChart(data);                   
                }
        });
    };

    // Create Table
    function createTable(response) {
        data = response;

        var length = data.length;
        var tbody = document.getElementById("tbody");
        tbody.innerHTML = '';
        
        for(var i = 0 ; i < length; i++) {
            
            
            var tr = document.createElement("tr");
            
            tr.innerHTML =  '<td>'+data[i].course+'</td>' +
                            '<td>'+data[i].grade+'</td>' +
                            '<td>'+data[i].ec+'</td>';
            
            tbody.appendChild(tr);
        }
    };

    // Create chart
    function createChart(response) {
            data = response;
            
            var length = data.length;
            var resultsArray = [];
            
            for(var i = 0 ; i < data.length; i++) {
            
                resultsArray.push(data[i].grade);
            }            

            new Chart(document.getElementById("line-chart"), {
                type: 'line',
                data: {
                labels: ['Week 1','Week 2','Week 3','Week 4'],
                datasets: [{ 
                        data: resultsArray,
                        label: 'Results',
                        borderColor: "#3e95cd",
                        fill: false
                        }]
                },
            
                //Options for chart
                options: {
                        title: {
                            display: true,
                            text: 'Progress'
                        },

                        scales: {
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true,
                                    max: 10,
                                    stepSize: 1
                                }
                            }]
                        }
                }   
            });
    };

    // Listener to different blokken
    window.addEventListener('click', function(){

        var id = event.srcElement.id.substr(4);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: '/getstats',
            data: {
                'blok': id            
            }, success: function (data) {
                createTable(data);
                createChart(data);
            }
        });        
    });
</script>
@endpush