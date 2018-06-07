@extends('adminlte::page')

@section('title', 'Courses: Leave Course')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h1 class="box-title">
                <strong>
                    Confirm Leave Course <a href="{{route('courses.show', ['id' => $course->course_abbreviation])}}" class="btn btn-primary btn-xs"><i class="fa fa-chevron-left"></i> Back </a>
                </strong>
            </h1>
        </div>

        <div class="box-body">
            <p>Are you sure you want to delete leave the course?</p>
            <form method="POST" action="{{ route('courses.leaveCourse', ['user_id'=>Auth::user()->id, 'course_id'=>request()->route('course_id')]) }}">
                @csrf
                <button type="submit" class="btn btn-danger">Yes I'm sure. Delete</button>
            </form>
        </div>
    </div>
@endsection

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush