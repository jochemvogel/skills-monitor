@extends('adminlte::page')

@section('title', 'Rubrics: Edit')

@section('content')
    <div class="box box-solid">
        <div class="box-header">
            <h1 class="box-title">
                <strong>
                    Rubrics: Edit
                </strong>
                <a href="{{route('rubrics.index')}}" class="btn btn-info btn-xs" title="Back">
                    <i class="fa fa-chevron-left"></i> Back
                </a>
            </h1>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <div id="example1_wrapper" class="">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="example1_length">
                        </div>
                    </div>
                </div>

                {{-- FORM --}}
                <form class="form-horizontal" action="{{ route('rubrics.store') }}" method="POST">
                    @csrf

                    {{-- NAME--}}

                    <input type='hidden' name='rubric' value='1'>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{$rubric->name}}"  required>
                            </div>
                        </div>

                        {{-- END NAME --}}



                        {{--DROPDOWN--}}

                        <div class="form-group {{ $errors->has('course') ? ' has-error ' : '' }}">
                            <label class="col-sm-2 control-label" for="course">Course <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control select2 select2-hidden-accessible" data-placeholder="Select a course" style="width: 100%;" tabindex="-1" aria-hidden="true" name="course">
                                    @if ($courses->count())
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @if ($errors->has('course'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('course') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{--END DROP DOWN-- }}


                        {{-- SUBMIT BUTTON --}}
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type='submit' class='btn btn-success btn-sm' value='Save'>
                            </div>
                        </div>
                    </div>

                    {{-- END SUBMIT BUTTON --}}

                </form>

                {{-- END FORM --}}
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush