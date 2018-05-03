@extends('adminlte::page')

@section('title', 'Rubrics: Overview')

@section('content')
    <div class="box box-solid">
        <div class="box-header">
            <h1 class="box-title">
                <strong>
                    Rubrics: Overview
                </strong>
                <a href="{{route('rubrics.create')}}" class="btn btn-primary btn-xs" title="Create new rubric">
                    <i class="fa fa-plus"></i> Create New
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


                <div class="row">
                    <div class="col-sm-12">
                        <table id="rubrics" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Course name</th>
                                <th>Rubric name</th>
                                <th>Creator</th>
                                <th>View</th>
                                <th class="rubrics_action">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rubrics as $rubric)
                                <tr role="row">
                                    <td><a href="{{route('courses.show',['course_abbreviation' => $rubric->courses2->course_abbreviation])}}" title="View course: {{ $rubric->courses2->name }}">{{ $rubric->courses2->name }}</a>

                                        @if($rubric->courses2->course_code != null && $rubric->courses2->course_abbreviation != null)

                                            ({{$rubric->courses2->course_abbreviation}},

                                        @elseif($rubric->courses2->course_code != null && $rubric->courses2->course_abbreviation == null )


                                        @elseif($rubric->courses2->course_code == null && $rubric->courses2->course_abbreviation != null )

                                             ({{$rubric->courses2->course_abbreviation}})


                                        @elseif($rubric->courses2->course_code == null && $rubric->courses2->course_abbreviation == null)

                                        @else
                                            -

                                        @endif



                                        @if($rubric->courses2->course_abbreviation != null && $rubric->courses2->course_code != null)
                                            {{$rubric->courses2->course_code}})



                                        @elseif($rubric->courses2->course_abbreviation != null && $rubric->courses2->course_code == null)



                                        @elseif($rubric->courses2->course_abbreviation == null && $rubric->courses2->course_code != null)

                                            ({{$rubric->courses2->course_code}})


                                        @elseif($rubric->courses2->course_abbreviation == null && $rubric->courses2->course_code == null)


                                        @else
                                            -

                                        @endif

                                    </td>
                                    <td>{{ $rubric->name }}</td>
                                    <td>{{ $rubric->creator->firstname }} {{ $rubric->creator->lastname }}</td>
                                    <td><a href="{{route('rubrics.update',['id' => $rubric->id])}}" title="View rubric: {{ $rubric->name }}" target="_blank">View rubric</a></td>
                                    <td>
                                        <a href="{{ route('rubrics.edit', ['id' => $rubric->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit rubric: {{ $rubric->name }}"></i> </a>
                                        <a href="{{ route('rubrics.delete', ['id' => $rubric->id], '/delete') }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete rubric: {{ $rubric->name }}"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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