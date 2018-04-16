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
            <table id="datatable-buttons" class="table table-striped table-bordered">
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
                            <tr>
                                <td>{{$row->firstname}}</td>
                                <td>{{$row->lastname}}</td>
                                <td>{{$row->email}}</td>
                                  @foreach($row->roles as $role)
                                    <td>{{$role->name}}</td>
                                  @endforeach
                                <td>
                                    <a href="{{ route('users.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('users.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection