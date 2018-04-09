@extends('adminlte::page')

@section('content')

    {{-- check if the name is set --}}
    @isset($_REQUEST['name'])
        {{-- check if the choosen name is already in use --}}
        @if(App\Http\Controllers\rubricsController::checkName($_REQUEST['name']) == NULL)
            {{-- show the name of the rubrics --}}
            <h1>{{ $_REQUEST['name'] }}</h1>

            {{-- make a table with the selected number of columns and rows --}}
            <table class='table table-striped table-bordered'>
                <thead>
                </thead>
                <tbody>
                    @for($i=0; $i<$_REQUEST['rows']; $i++)
                        <tr>
                        @for($j=0; $j<$_REQUEST['cols']; $j++)
                            <td>test</td>
                        @endfor
                        </tr>
                    @endfor
                </tbody>
            </table>

            <br><br>

            {{-- add row button --}}
            <form method='POST'>
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                <input type='hidden' name='name' value='{{ $_REQUEST['name'] }}'>
                <input type='hidden' name='rows' value='{{ $_REQUEST['rows'] + 1 }}'>
                <input type='hidden' name='cols' value='{{ $_REQUEST['cols'] }}'>
                <button class='btn-info btn-sm' type='submit' name='add_row'><i class='fa fa-plus-square-o'></i>&nbsp;&nbsp;Voeg rij toe</button>
            </form>

            <br>

            {{-- remove row button --}}
            @if($_REQUEST['rows'] > 1)
            <form method='POST'>
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                <input type='hidden' name='name' value='{{ $_REQUEST['name'] }}'>
                <input type='hidden' name='rows' value='{{ $_REQUEST['rows'] - 1 }}'>
                <input type='hidden' name='cols' value='{{ $_REQUEST['cols'] }}'>
                <button class='btn-danger btn-sm' type='submit' name='delete_row'><i class='fa fa-minus-square-o'></i>&nbsp;&nbsp;Verwijder rij</button>
            </form>
            @endif

        {{-- the name is already in use --}}
        @else
            {{-- display a message wich says the name already exists in the database --}}
            {{-- TODO make an option to edit the existing rubrics (if you have the rights) --}}
            <div class='alert text-center alert-danger'>
                That name is already in use try something else !
            </div>

            {{-- send the form to fill in another name (and number of collumns) --}}
            <form method='POST'>
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                Name: <input type='text' name='name' value='{{ $_REQUEST['name'] }}' required>
                Collumns: <input type='number' min='1' max='10' step='1' name='cols' value='{{ $_REQUEST['cols'] }}' required>
                <input type='hidden' name='rows' value='1'>
                <input type='submit' class='btn btn-primary btn-sm' value='Save'>
            </form>
        @endif
    {{-- the name isn't set, display the form--}}
    @else
        <form method='POST'>
        <input type='hidden' name='_token' value='{{ Session::token() }}'>
        Name: <input type='text' name='name' value='default' required>
        Collumns: <input type='number' min='1' max='10' step='1' name='cols' value='6' required>
        <input type='hidden' name='rows' value='1'>
        <input type='submit' class='btn btn-primary btn-sm' value='Save'>
        </form>
    @endisset
@endsection