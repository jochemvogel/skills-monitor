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

            <div class="pull-right">
                <a href="#" onClick="alert('Not working yet')" class="btn btn-danger btn-xs float-right" ><i class="fa fa-times"></i> Leave Course</a>
            </div>
        </div>

        <div class="box-body with-border">
            <h2>
                Rubrics
            </h2>
            <table id="show-courses" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @can('create', \App\Course::class)
                    <a href="{{ route('rubrics.create')}}"  class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Create New Rubric</a>
                @endcan
                <div class="pull-right">
                    <a href="{{ route('courses.remove',['id' => $course->id])}}" class="btn btn-danger btn-xs" ><i class="fa fa-times"></i> Remove Rubric</a>
                </div>
                <br>
                <br>
                @if(count($rubrics))
                    @foreach($rubrics as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>
                                <a href="{{ route('rubrics.show',['id' => $row->id])}}" class="btn btn-info btn-xs"><i class="fa fa-eye" title="View rubric {{$row->name}}"></i></a>
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
            <table id="show-users" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <a href="{{ route('courses.add',['id' => $course->id])}}"  class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add New User</a>
                    <br>
                    <br>
                     @if(count($course->users))
                        @foreach($course->users as $row)
                            <tr>
                                <td>{{$row->firstname}}</td>
                                <td>{{$row->lastname}}</td>
                                <td>
                                    <a href="mailto: {{ $row->email }}," class="btn btn-warning btn-xs"><i class="fa fa-envelope" title="Send mail to {{$row->firstname}} {{$row->lastname}}"></i> </a>
                                    @can('delete', $row)
                                        <a href="{{ route('courses.removeUser', ['course_id' => $course->id, 'user_id' => $row->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash" title="Remove {{$row->firstname }} {{$row->lastname}} from {{$course->name}}"></i> </a>
                                    @endcan
                                </td>
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