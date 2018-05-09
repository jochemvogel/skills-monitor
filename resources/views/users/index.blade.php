@extends('adminlte::page')

@section('title', 'Users: Overview')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h1 class="box-title">
                <strong>
                    Users: Overview
                    @can('create', Auth::user())
                        <a href="{{route('users.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a>
                    @endcan
                </strong>
            </h1>
        </div>
        <div class="box-body">
            <table id="users" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users))
                        @foreach($users as $row)
                            @can('view', $row)
                                @if($row->deleted != true)
                                    <tr>
                                        <td>{{$row->firstname}}</td>
                                        <td>{{$row->lastname}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->role->name}}</td>
                                        <td>
                                            @can('update', $row)
                                                <a href="{{ route('users.edit', ['id' => $row->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                            @endcan
                                            @can('delete', $row)
                                                <a href="{{ route('users.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endif
                            @endcan
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