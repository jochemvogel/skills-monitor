@extends('adminlte::page')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    Courses
                    @can('create', \App\Course::class)
                        <a href="{{route('courses.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a>
                    @endcan
                </strong>
            </h3>
        </div>
        <div class="box-body">
            <table id="courses" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Abbreviation</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>View</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($courses))
                        @foreach($courses as $row)
                            <tr>
                                
                                @if($row->course_abbreviation != null && $row->real_abbreviation == true)
                                  <td>{{$row->course_abbreviation}}</td>
                                @else
                                  <td>-</td>  
                                @endif
                                
                                @if($row->course_code != null)
                                  <td>{{$row->course_code}}</td>
                                @else
                                  <td>-</td>                                    
                                @endif

                                <td>{{$row->name}}</td>

                                <td><a href="{{route('courses.show',['course_abbreviation' => $row->course_abbreviation])}}">View</a></td>
                                
                                <td>
                                    @can('update', $row)
                                        <a href="{{ route('courses.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    @endcan
                                    @can('delete', $row)
                                        <a href="{{ route('courses.delete', ['id' => $row->id], '/delete') }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @endif
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
            $('#courses').DataTable();
        });
    </script>
@endpush

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

