@extends('adminlte::page')

@section('content')
@extends('adminlte::page')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    Courses <a href="{{route('courses.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a>
                </strong>
            </h3>
        </div>
        <div class="box-body">
            <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Abbreviation</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($courses))
                        @foreach($courses as $row)
                            <tr>
                                
                                @if($row->course_abbreviation != null)
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
                                
                                <td>
                                    <a href="{{ route('courses.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('courses.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
@endsection