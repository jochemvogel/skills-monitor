@extends('adminlte::page')

@section('title', 'Courses: ' . $course->name)

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h1 class="box-title">
                <strong>
                    @if($course->course_abbreviation != null && $course->real_abbreviation == true)
                    {{$course->course_abbreviation}} -
                    @endif
                    {{$course->name}}
                </strong>
            </h1>
        </div>
        <div class="box-body with-border">
            <h2>
                Rubrics
            </h2>
            <br>

            <table id="show-courses" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($rubrics))
                        @foreach($rubrics as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>
                                    <a href="{{ route('rubrics.show',['id' => $row->id])}}" class="btn btn-info btn-xs"><i class="fa fa-eye" title="View rubric"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>

    <div class="box box-solid">
        <div class="box-body with-border">
            <h2>
                Users
            </h2>
            <br>
            <table id="show-users" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($rubrics))
                    @foreach($rubrics as $row)
                        <tr>
                            <td>Admin</td>
                            <td>Admin</td>
                            <td>Edit & Mail</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection

@push ('js')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#show-courses').DataTable();
        });

        $(document).ready(function() {
            $('#show-users').DataTable();
        });
    </script>
@endpush

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush
