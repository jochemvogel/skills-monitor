@extends('adminlte::page')

@section('content')
    {{-- create a box around the rubrics and it's name --}}
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    {{-- show the name of the rubrics --}}
                    {{ $courses->name }}
                </strong>
            </h3>
        </div>
        <div class="box-body">
            {{-- make a table with the selected number of columns and rows --}}
            <table class='table table-striped table-bordered'>
                <thead>
                </thead>
                <tbody>
                    @foreach($rubrics as $row)
                        <tr>{{$rubrics->name}}</tr>
                    @endforeach
                </tbody>
            </table>
            <br>

    </div>
@endsection