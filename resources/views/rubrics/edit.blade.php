@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Rubric <a href="{{route('rubrics.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('rubrics.update', ['id' => $rubric->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name<span class="required">*</span></label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$rubric->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course">Course<span class="required">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control select2 select2-hidden-accessible" data-placeholder="Select a course" style="width: 100%;" tabindex="-1" aria-hidden="true" name="course">
                                    <option value="son1">SON1</option>
                                    <option value="son1">IRE1</option>
                                    <option value="son1">SAN1</option>
                                </select>
                            </div>
                        </div>

                        {{--<div class="form-group {{ $errors->has('course') ? ' has-error ' : '' }}">--}}
                            {{--<label class="col-sm-2 control-label" for="course">Course <span class="required">*</span></label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<select class="form-control select2 select2-hidden-accessible" data-placeholder="Select a course" style="width: 100%;" tabindex="-1" aria-hidden="true" name="course">--}}
                                    {{--<option>test1</option>--}}
                                    {{--<option>test2</option>--}}
                                    {{--<option>test3</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            {{--@if ($errors->has('course'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('course') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}



                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success">Save Rubric Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection