@extends('adminlte::page')

@section('content')
    @section('content_header')
    @endsection
    <div class="">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Users <a href="{{route('users.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
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
                                @foreach ($users as $row)

                                    <!-- function to check the role of the user -->
                                    <?php
                                        if($row->hasRole('admin')) {
                                            $role = 'Admin';
                                        }
                                        else if($row->hasRole('teacher')) {
                                            $role = 'Teacher';
                                        }
                                        else if($row->hasRole('student')) {
                                            $role = 'Student';
                                        }
                                        else if($row->hasRole('external')) {
                                            $role = 'External codereviewer';
                                        }
                                        else if($row->hasRole('guest')) {
                                            $role = 'Guest';
                                        }
                                    ?>

                                    <tr>
                                        <td>{{$row->firstname}}</td>
                                        <td>{{$row->lastname}}</td>
                                        <td>{{$row->email}}</td>
                                        <td><?php echo $role ?></td>
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
            </div>
        </div>
    </div>
@endsection