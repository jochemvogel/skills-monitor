@extends('adminlte::page')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Progress</strong></h3>
        </div>

        <div class="box-body">
            <a href="{{route('stats.index')}}" class="btn btn-primary btn-xs">BLOK 1</a>
            <a href="{{route('stats.show', ['id' => 2])}}" class="btn btn-primary btn-xs">BLOK 2</a>
            <a href="{{route('stats.show', ['id' => 3])}}" class="btn btn-primary btn-xs">BLOK 3</a>
            <a href="{{route('stats.show', ['id' => 4])}}" class="btn btn-primary btn-xs">BLOK 4</a>

            <div class="x_content" id="table">  
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Course name</th>
                            <th>Grade</th>
                            <th>EC</th>
                        </tr>
                    </thead>

                    @yield('tbody')

                </table>
            </div>

            <div class="x_content">
                <canvas id="line-chart" width="400" height="225"></canvas>
            </div>

        </div>
    </div>

@endsection


