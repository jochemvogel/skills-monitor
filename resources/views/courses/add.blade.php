@extends('adminlte::page')

@section('title', 'Courses: Add User')

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h1 class="box-title">
                <strong>
                    Courses: Add User
                </strong>
            </h1>
        </div>

        {{--NAME--}}
        <div class="box-body">
            <form class="form-horizontal" action="{{ route('courses.store') }}" method="POST">
                @csrf
                <input type='hidden' name='rows' value='1'>
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="course">Name <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control select2 select2-hidden-accessible" data-placeholder="Select a course" style="width: 100%;" tabindex="-1" aria-hidden="true" name="course">
                                    @if(count($users))
                                        @foreach($users as $row)
                                            <option value="{{ $row->id }}">{{ $row->firstname }} {{$row->lastname}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

        {{--COURSE--}}
                <input type='hidden' name='rows' value='1'>
                    <div class="form-group">
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
@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush