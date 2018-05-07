@extends('adminlte::page')

@section('content')
    <div class="box box-solid"">
        <div class="box-header">
            <h3 class="box-title">
                <strong>
                    List of all the rubrics
                </strong>
                <a href="{{route('rubrics.create')}}" class="btn btn-primary btn-xs">
                    <i class="fa fa-plus"></i> Create New
                </a>
            </h3>
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
                                    <td>{{ $rubric->courses2->name }}

                                        @if($rubric->courses2->course_code != null && $rubric->courses2->course_abbreviation != null)

                                            ({{$rubric->courses2->course_abbreviation}},

                                        @elseif($rubric->courses2->course_code != null && $rubric->courses2->course_abbreviation == null  )


                                        @elseif($rubric->courses2->course_code == null && $rubric->courses2->course_abbreviation != null)

                                             ({{$rubric->courses2->course_abbreviation}})

                                        @elseif($rubric->courses2->course_code == null && $rubric->courses2->course_abbreviation == null)

                                        @else
                                            -

                                        @endif



                                        @if($rubric->courses2->course_abbreviation != null && $rubric->courses2->course_code != null)

                                            {{$rubric->courses2->course_code}})


                                        @elseif($rubric->courses2->course_abbreviation != null && $rubric->courses2->course_code == null )



                                        @elseif($rubric->courses2->course_abbreviation == null && $rubric->courses2->course_code != null )

                                            ({{$rubric->courses2->course_code}})


                                        @elseif($rubric->courses2->course_abbreviation == null && $rubric->courses2->course_code == null )


                                        @else
                                            -

                                        @endif

                                    </td>
                                    <td>{{ $rubric->name }}</td>
                                    <td>{{ $rubric->creator->firstname }} {{ $rubric->creator->lastname }}</td>
                                    <td><a href="{{route('rubrics.update',['id' => $rubric->id])}}">View</a></td>
                                    <td>Edit Remove</td>
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