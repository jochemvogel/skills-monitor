@extends('adminlte::page')

@section('title', 'Users: Create')

@section('content')
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">
            <strong>
                Users: Create
            </strong>
        </h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="form-group"{{ $errors->has('firstname') ? ' has-error' : '' }}>
                    <label for="First Name" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="firstname" placeholder="first name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Last Name" class="col-sm-2 control-label"{{ $errors->has('lastname') ? ' has-error' : '' }}>Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lastname" placeholder="last name" required>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="Email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" placeholder="email" required>
                        @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group"{{ $errors->has('password') ? ' has-error' : '' }}>
                    <label for="Password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password" placeholder="password" required>
                    </div>
                </div>
                <div class="form-group"{{ $errors->has('confirm_password') ? ' has-error' : '' }}>
                    <label for="Confirm Password" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="confirm_password" placeholder="confirm password" required>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('role') ? ' has-error ' : '' }}">
                    <label class="col-sm-2 control-label" for="role">Role <span class="required">*</span>
                    </label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="role" id="role">
                          @if ($roles->count())
                            @foreach($roles as $role)
                              <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>
                      @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                      @endif
                    </div> 

                <div class="box-footer">
                <div class="pull-right">
                    <input type='submit' class='btn btn-success btn-sm' value='Save'>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush