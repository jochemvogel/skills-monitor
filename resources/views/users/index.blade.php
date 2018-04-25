@extends('adminlte::page')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    Users <a href="{{route('users.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a>
                </strong>
            </h3>
        </div>
        <div class="box-body">
            <table id="users" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        @if(Auth::user()->hasrole('admin'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if(count($users))
                        @foreach($users as $row)
                            <tr>
                                <td>{{$row->firstname}}</td>
                                <td>{{$row->lastname}}</td>
                                <td>{{$row->email}}</td>
                                  @foreach($row->roles as $role)
                                    <td>{{$role->name}}</td>
                                  @endforeach
                                  @if(Auth::user()->hasrole('admin'))
                                  <td>
                                      <a href="{{ route('users.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                      <a href="{{ route('users.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                  </td>
                                  @endif
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
            $('#users').DataTable();
        });
    </script>
@endpush

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush