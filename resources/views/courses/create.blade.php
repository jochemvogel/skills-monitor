@extends('adminlte::page')

@section('title', 'Courses: Create')

@section('content')
    {{-- @section('content_header')
    @endsection
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create Course <a href="{{route('courses.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{ route('courses.store') }}" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('course_abbreviation') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_abbreviation">Course abbreviation
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{ Request::old('course_abbreviation') ?: '' }}" id="course_abbreviation" name="course_abbreviation" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('course_abbreviation'))
                                    <span class="help-block">{{ $errors->first('course_abbreviation') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('course_code') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_code">Course code
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{ Request::old('course_code') ?: '' }}" id="course_code" name="course_code" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('course_code'))
                                    <span class="help-block">{{ $errors->first('course_code') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <button type="submit" class="btn btn-success">Create Course</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

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