@extends('adminlte::page')

@section('title', 'Rubrics: Overview')

@section('content')
    <div class="box box-solid">
        <div class="box-header">
            <h1 class="box-title">
                <strong>
                    Rubrics: Overview
                </strong>
                {{--ADMIN/DOCENT--}}
                <a href="{{route('rubrics.create')}}" class="btn btn-primary btn-xs" title="Create new rubric">
                    <i class="fa fa-plus"></i> Create New
                </a>
                {{--ADMIN/DOCENT--}}
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


                {{-- TABLE HEADER --}}

                <div class="row">
                    <div class="col-sm-12">
                        <table id="rubrics" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Course name</th>
                                <th>Rubric name</th>
                                <th>Creator</th>
                                <th>View</th>
                                {{--ADMIN/DOCENT--}}
                                <th class="rubrics_action">Action</th>
                                {{--ADMIN/DOCENT--}}
                            </tr>
                            </thead>

                {{-- END TABLE HEADER --}}


                {{-- TABLE BODY --}}
                            <tbody>
                            @foreach($rubrics as $rubric)
                                <tr role="row">
                                    <td><a href="{{route('courses.show',['course_abbreviation' => $rubric->courses_id->course_abbreviation])}}" title="View course: {{ $rubric->courses_id->name }}">{{ $rubric->courses_id->name }}</a>


                                        {{-- COURSE ABBREVIATION --}}

                                        {{--  +Code +abb --}}
                                        @if($rubric->courses_id->course_code != null && $rubric->courses_id->course_abbreviation != null)


                                            ({{$rubric->courses_id->course_abbreviation}},


                                        {{--  +Code -abb--}}
                                        @elseif($rubric->courses_id->course_code != null && $rubric->courses_id->course_abbreviation == null )


                                        {{--  -Code +abb --}}
                                        @elseif($rubric->courses_id->courses_id == null && $rubric->courses_id->course_abbreviation != null )

                                             ({{$rubric->courses_id->course_abbreviation}})


                                        {{--  -Code -abb --}}
                                        @elseif($rubric->courses_id->course_code == null && $rubric->courses_id->course_abbreviation == null)

                                        @endif

                                        {{-- COURSE CODE--}}


                                        {{--  +Code +abb --}}
                                        @if($rubric->courses_id->course_abbreviation != null && $rubric->courses_id->course_code != null)
                                            {{$rubric->courses_id->course_code}})


                                        {{--  +Code -abb --}}
                                        @elseif($rubric->courses_id->course_abbreviation != null && $rubric->courses_id->course_code == null)



                                        {{--  -Code +abb --}}
                                        @elseif($rubric->courses_id->course_abbreviation == null && $rubric->courses_id->course_code != null)

                                            ({{$rubric->courses_id->course_code}})


                                        {{--  -Code -abb --}}
                                        @elseif($rubric->courses_id->course_abbreviation == null && $rubric->courses_id->course_code == null)

                                        @endif

                                    </td>
                                    <td>{{ $rubric->name }}</td>
                                    <td>{{ $rubric->creator->firstname }} {{ $rubric->creator->lastname }}</td>
                                    <td><a href="{{route('rubrics.update',['id' => $rubric->id])}}" title="View rubric">View rubric</a></td>
                                    {{--ADMIN/DOCENT--}}
                                    <td>
                                        <a href="{{ route('rubrics.delete', ['id' => $rubric->id], '/delete') }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete rubric"></i> </a>
                                    </td>
                                    {{--ADMIN/DOCENT--}}
                                </tr>
                            @endforeach
                            </tbody>

                            {{-- END TABLE BODY --}}

                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push ('js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#rubrics').DataTable();
    });
</script>
@endpush

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush