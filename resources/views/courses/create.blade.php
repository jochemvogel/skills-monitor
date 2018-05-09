@extends('adminlte::page')

@section('title', 'Courses: Create')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    Create new course
                </strong>
            </h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="{{ route('courses.store') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group"{{ $errors->has('name') ? ' has-error' : '' }}>
                        <label for="Name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Course Abbreviation" class="col-sm-2 control-label"{{ $errors->has('course_abbreviation') ? ' has-error' : '' }}>Course Abbreviation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="course_abbreviation" placeholder="course abbreviation">
                        </div>
                    </div>
                    <div class="form-group"{{ $errors->has('course_code') ? ' has-error' : '' }}>
                        <label for="Course Code" class="col-sm-2 control-label">Course Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="course_code" placeholder="course code">
                        </div>
                    </div>
    
                    <div class="box-footer">
                    <div class="pull-right">
                        <input type='submit' class='btn btn-success btn-sm' value='Save'>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush