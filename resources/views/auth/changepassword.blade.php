@extends('adminlte::page')
@section('content')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    Change password
                </strong>
            </h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" method="POST" action="{{ route('changePassword')}}">
                @csrf
                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                    <label for="current-password" class="col-sm-2 control-label">Current Password</label>
                    <div class="col-sm-10">
                        <input id="current-password" type="password" class="form-control" name="current-password" required>
                        @if($errors->has('current-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('current-password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                    <label for="new-password" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                        <input id="new-password" type="password" class="form-control" name="new-password" required>
                        @if($errors->has('new-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="new-password-confirm" class="col-sm-2 control-label">Confirm New Password</label>
                    <div class="col-sm-10">
                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                        @if($errors->has('new-password-confirm'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new-password-confirm') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <input type='submit' class='btn btn-success btn-sm' value="save">
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