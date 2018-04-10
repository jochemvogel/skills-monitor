@extends('adminlte::page')

@section('content')
    @section('content_header')
        <h1>Progress</h1>
    @endsection

    <button class="btn btn-primary btn-xs" id="1"> BLOK 1</button>
    <button class="btn btn-primary btn-xs" id="2"> BLOK 2</button>
    <button class="btn btn-primary btn-xs" id="3"> BLOK 3</button>
    <button class="btn btn-primary btn-xs" id="4"> BLOK 4</button>

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
                        <td>AAAAA</td>
                        <td>##</td>
                        <td>##</td>    
                    </tr>

            </tbody>

        </table>
    </div>


@endsection