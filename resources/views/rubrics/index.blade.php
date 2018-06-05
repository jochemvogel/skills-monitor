@extends('adminlte::page')

@section('title', 'Rubrics: Overview')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h1 class="box-title">
                <strong>
                    Rubrics: Overview
                    @can('create', \App\Course::class)
                        <a href="{{route('rubrics.create')}}" class="btn btn-primary btn-xs" title="Create new rubric">
                            <i class="fa fa-plus"></i> Create New
                        </a>
                    @endcan
                </strong>
            </h1>
        </div>

            <div class="box-body">
                <table id="rubrics" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Course name</th>
                            <th>Rubric name</th>
                            <th>Creator</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rubrics as $rubric)
                            <tr role="row">
                                <td>
                                    <a href="{{route('courses.show',['course_abbreviation' => $rubric->courses_id->course_abbreviation])}}" title="View course: {{ $rubric->courses_id->name }}">{{ $rubric->courses_id->name }}</a>


                                    @if($rubric->courses_id->course_code != null)
                                       @if($rubric->courses_id->real_abbreviation == true)
                                            ({{$rubric->courses_id->course_abbreviation}}, {{$rubric->courses_id->course_code}})
                                        @else
                                            ({{$rubric->courses_id->course_code}})
                                        @endif
                                    @else
                                        ({{$rubric->courses_id->course_abbreviation}})
                                    @endif
                                </td>
                                <td>{{ $rubric->name }}</td>
                                <td>{{ $rubric->creator->firstname }} {{ $rubric->creator->lastname }}</td>
                                <td>
                                @can('view', $rubric)
                                    <a href="{{ route('rubrics.show',['id' => $rubric->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" title="View rubric"></i></a>
                                @endcan
                                @can('update', $rubric)
                                    <a href="{{ route('rubrics.edit', ['id' => $rubric->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-pencil" title="Edit"></i></a>
                                @endcan
                                @can('delete', $rubric)
                                    <a href="{{ route('rubrics.delete', ['id' => $rubric->id], '/delete') }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete rubric"></i></a>
                                @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
<script>
    document.addEventListener('click', function(){
        if(event.srcElement.classList[1] === "fa-pencil"){
            sessionStorage.setItem("edit", 'true');
        }else{
            sessionStorage.setItem("edit", 'false');
        }
    })
</script>
@endpush

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush