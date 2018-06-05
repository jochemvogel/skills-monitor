@extends('adminlte::page')


@section('content')
<div class="box box-solid" style="width: 17%;">
    <div class="box-header with-border">
        <h1 class="box-title">
            <strong>
                Users in this course
            </strong>
        </h1>
    </div>
    <div class="box-body">
        <p><i class="fa fa-circle" style="color: green;"></i> David Aspelagh</p>
        <p><i class="fa fa-circle" style="color: red;"></i> Bradley Eijke</p>
        <p><i class="fa fa-circle" style="color: red;"></i> Adit Permadi</p>
        <p><i class="fa fa-circle" style="color: green;"></i> Robin Spuij</p>
        <p><i class="fa fa-circle" style="color: red;"></i> Jochem Vogel</p>
    </div>
    <div class="box-footer with-border">
        <div class="pull-right">
        <p style="font-size: 10px;"><i class="fa fa-circle" style="color: green;"></i> = online</p>
        <p style="font-size: 10px;"><i class="fa fa-circle" style="color: red;"></i> = offline</p>
        </div>
    </div>
</div>
@stop

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush