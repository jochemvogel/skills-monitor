@extends('adminlte::page')

@section('content')

    {{-- create a box around the rubrics and it's name --}}
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    {{-- show the name of the rubrics --}}
                    {{ session('name') }}
                </strong>
            </h3>
        </div>
        <div class="box-body">
            {{-- make a table with the selected number of columns and rows --}}
            <table class='table table-striped table-bordered'>
                <thead>
                </thead>
                <tbody>
                @for($i=0; $i<session('rows'); $i++)
                    <tr>
                        @for($j=0; $j<session('cols'); $j++)
                            <td>test</td>
                        @endfor
                    </tr>
                @endfor
                </tbody>
            </table>
            <br>
            <div class="pull-left">
                {{-- add row button --}}
                <form method='POST' action="{{route('rubrics.update',['id' => session('id')])}}">
                    @method('PUT')
                    <input type='hidden' name='_token' value='{{ Session::token() }}'>
                    <input type='hidden' name='name' value='{{ session('name') }}'>
                    <input type='hidden' name='rows' value='{{ session('rows') + 1 }}'>
                    <input type='hidden' name='cols' value='{{ session('cols') }}'>
                    <button class='btn-info btn-sm' type='submit' name='add_row'><i class='fa fa-plus-square-o'></i>&nbsp;&nbsp;Voeg rij toe</button>
                </form>
            </div>
            <div class="pull-right">
                {{-- remove row button --}}
                @if(session('rows') > 1)
                    <form method='POST' action="{{route('rubrics.update',['id' => session('id')])}}">
                        @method('PUT')
                        <input type='hidden' name='_token' value='{{ Session::token() }}'>
                        <input type='hidden' name='name' value='{{ session('name') }}'>
                        <input type='hidden' name='rows' value='{{ session('rows') - 1 }}'>
                        <input type='hidden' name='cols' value='{{ session('cols') }}'>
                        <button class='btn-danger btn-sm' type='submit' name='delete_row'><i class='fa fa-minus-square-o'></i>&nbsp;&nbsp;Verwijder rij</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection