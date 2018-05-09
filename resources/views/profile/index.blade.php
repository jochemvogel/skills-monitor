@extends('adminlte::page')

@section('title', 'Profile: (Naam)')

<?php use Illuminate\Support\Facades\Auth; ?>

@section('content')
    @if(Auth::check())
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="http://skills.hz/img/coffee.png" alt="User profile picture">

            <h3 class="profile-username text-center"><?php echo(Auth::user()->firstname.' '.Auth::user()->lastname); ?></h3>

            <p class="text-muted text-center">Eerstejaars</p>

        </div>
        <!-- /.box-body -->
    </div>


    <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                <p class="text-muted">
                    HBO-ICT, HZ University of Applied Sciences at Vlissingen
                </p>

                <hr>

                <strong><i class="fa fa-envelope margin-r-5"></i> Mail</strong>

                <p class="text-muted">
                    admin@admin.com - Click <a href="{{ route('users.index') }}">here</a> to change
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                <p class="text-muted">Middelburg, the Netherlands</p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Bio</strong>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
        @endif

@endsection

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush