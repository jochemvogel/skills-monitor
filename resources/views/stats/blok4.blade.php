@extends('adminlte::page')

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    Progress
                </strong>
            </h3>
        </div>

        <div class="box-body">
            <a href="{{route('stats.index')}}" class="btn btn-primary btn-xs">BLOK 1</a>
            <a href="{{route('stats.blok2')}}" class="btn btn-primary btn-xs">BLOK 2</a>
            <a href="{{route('stats.blok3')}}" class="btn btn-primary btn-xs">BLOK 3</a>
            <a href="{{route('stats.blok4')}}" class="btn btn-primary btn-xs">BLOK 4</a>
        
            <div class="x_content" id="table">  
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Grade</th>
                            <th>EC</th>
                        </tr>
                    </thead>

                    <tbody>
                            <!-- Foreach-loop, create table row with data for each course-->
                            <tr>
                                <td>DDDDD</td>
                                <td>##</td>
                                <td>##</td>    
                            </tr>

                    </tbody>    

                </table>
            </div>
        </div>

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Line Chart</strong></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                </div>
            
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="lineChart" style="height:250px"></canvas>
                    </div>
            </div>
    </div>

@endsection
