@extends('adminlte::page')

@section('title', 'Courses: ' . $course->name)

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    @if($course->course_abbreviation != null && $course->real_abbreviation == true)
                    {{$course->course_abbreviation}} -
                    @endif
                    {{$course->name}}
                </strong>
            </h3>
        </div>
        <div class="box-body">
            <table id="datatable-buttons" class="table table-striped table-bordered">
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
                                <td><a href="{{route('rubrics.show',['id' => $row->id])}}">View</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
