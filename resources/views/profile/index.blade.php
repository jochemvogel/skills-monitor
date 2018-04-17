@extends('adminlte::page')
<?php use Illuminate\Support\Facades\Auth; ?>
    @section('content')
    <div class="container">

        <!-- Shows information about the user when logged in -->

        @if(Auth::check())
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <i class="fa fa-user"></i> 
                            <h1 class="box-title">Profile</h3>
                        </div>

                        <div class="box-body">
                            <h3>Welcome <?php echo(Auth::user()->firstname.' '.Auth::user()->lastname); ?></h2>
                            <p>Your e-mail address is: <?php echo(Auth::user()->email); ?></p>
                            <p>Do you want to change your email address? Click <a href="{{ route('users.index') }}">here</a></p>
                        </div>

                    </div>
                </div>
            </div>
         @endif

        <!-- When not logged in user is redirected to login page -->

         @if(Auth::guest())
         <a href="/login" class="btn btn-danger"> You have to login first before you can view your profile!</a>
         @endif
    </div>
    @endsection