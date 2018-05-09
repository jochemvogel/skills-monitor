@extends('adminlte::page')

@section('title', 'Users: Create')

@section('content')
    @section('content_header')
    @endsection
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create User <a href="{{route('users.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{ route('users.store') }}" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{ Request::old('firstname') ?: '' }}" id="firstname" name="firstname" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('firstname'))
                                        <span class="help-block">{{ $errors->first('firstname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{ Request::old('lastname') ?: '' }}" id="lastname" name="lastname" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('lastname'))
                                        <span class="help-block">{{ $errors->first('lastname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{ Request::old('email') ?: '' }}" id="email" name="email" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" value="{{ Request::old('password') ?: '' }}" id="password" name="password" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('password'))
                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Confirm Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" value="{{ Request::old('confirm_password') ?: '' }}" id="confirm_password" name="confirm_password" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('confirm_password'))
                                        <span class="help-block">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('role') ? ' has-error ' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Role <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="role" id="role">
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

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <button type="submit" class="btn btn-success">Create User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection