@extends('adminlte::page')

@section('content')
    @section('content_header')
    @endsection
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit User <a href="{{route('users.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{ route('users.update', ['id' => $user->id]) }}" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{$user->firstname}}" id="firstname" name="firstname" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('firstname'))
                                    <span class="help-block">{{ $errors->first('firstname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{$user->lastname}}" id="lastname" name="lastname" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('lastname'))
                                    <span class="help-block">{{ $errors->first('lastname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{$user->email}}" id="email" name="email" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('role') ? ' has-error ' : '' }}">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="input-group">
                                    <select class="form-control" name="role" id="role">
                                      @if ($roles->count())
                                        @foreach($roles as $role)
                                          <option value="{{ $role->id }}" {{ $currentRole->id == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                      @endif
                                    </select>
                                    <label class="input-group-addon" for="role"><i class="fa fa-fw {{ trans('forms.create_user_icon_role') }}" aria-hidden="true"></i></label>
                                  </div>
                                  @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                  @endif
                                </div>
                              </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    <button type="submit" class="btn btn-success">Save User Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection