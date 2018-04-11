@extends('adminlte::page')

@section('content')
        <form method='POST' action="{{ route('rubrics.store') }}">
            <input type='hidden' name='_token' value='{{ Session::token() }}'>
            Name: <input type='text' name='name' value='default' required>
            Collumns: <input type='number' min='1' max='10' step='1' name='cols' value='6' required>
            <input type='hidden' name='rows' value='1'>
            <input type='submit' class='btn btn-primary btn-sm' value='Save'>
        </form>
@endsection