@extends('adminlte::page')

@section('title', 'Courses: Edit')

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h1 class="box-title">
                <strong>
                 Course: Edit
                </strong>
            </h1>
        </div>

        <div class="row">
            <div class="x_content">
                <br />
                <form method="post" action="{{ route('courses.update', ['id' => $course->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    @method('put')
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$course->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('course_abbreviation') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_abbreviation">Abbreviation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            @if($course->real_abbreviation)
                                <input type="text" value="{{$course->course_abbreviation}}" id="course_abbreviation" name="course_abbreviation" class="form-control col-md-7 col-xs-12">
                            @else
                                <input type="text" value="" id="course_abbreviation" name="course_abbreviation" class="form-control col-md-7 col-xs-12">
                            @endif
                            @if ($errors->has('course_abbreviation'))
                                <span class="help-block">{{ $errors->first('course_abbreviation') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('course_code') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_code">Code <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$course->course_code}}" id="course_code" name="course_code" class="form-control col-md-7 col-xs-12">
                            @if($errors->has('course_code'))
                                <span class="help-block">{{ $errors->first('course_code') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Save Course Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush