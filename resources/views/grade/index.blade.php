@extends('adminlte::page')

@section('title', 'Judgement: Overview')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h1 class="box-title">
                <strong>
                    Grade: Overview
                </strong>
            </h1>
        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td>

                    </td>
                </tr>
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
            $('#courses').DataTable();
        });
    </script>
@endpush

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush