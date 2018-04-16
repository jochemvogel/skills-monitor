@extends('adminlte::page')

@section('content')
    {{-- create a box around the rubrics and it's name --}}
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    {{-- show the name of the rubrics --}}
                    {{ $rubrics->name }}
                </strong>
            </h3>
        </div>
        <div class="box-body">
            {{-- make a table with the selected number of columns and rows --}}
            <table class='table table-striped table-bordered'>
                <thead>
                </thead>
                <tbody>
                @foreach($rubrics->rowobjects as $row)
                    <tr>
                        <td>
                            {{-- #TODO make the buttons do something --}}
                            <a href="#" class="link-black"><i class="fa fa-toggle-up"></i></a>
                            <a href="#" class="link-black"><i class="fa fa-trash"></i></a>
                            <a href="#" class="link-black"><i class="fa fa-toggle-down"></i></a>
                        </td>
                        @foreach($row->fields as $field)
                            <td>{{  $field->content }}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <div class="pull-left">
                {{-- add row button --}}
                <form method='POST' action="{{route('rubrics.update',['id' => $rubrics->id])}}">
                    @method('PUT')
                    @csrf
                    <input type='hidden' name='name' value='{{ $rubrics->name}}'>
                    <input type='hidden' name='rows' value='{{ $rows + 1 }}'>
                    <input type='hidden' name='cols' value='{{ $rubrics->cols }}'>
                    <button class='btn-success btn-sm' type='submit' name='add_row'><i class='fa fa-plus-square-o'></i>&nbsp;&nbsp;Add row</button>
                </form>
            </div>
            <div class="pull-right">
                {{-- remove row button --}}
                @if($rows > 1)
                    <form method='POST' action="{{route('rubrics.update',['id' => $rubrics->id])}}">
                        @method('PUT')
                        @csrf
                        <input type='hidden' name='name' value='{{ $rubrics->name }}'>
                        <input type='hidden' name='rows' value='{{ $rows - 1 }}'>
                        <input type='hidden' name='cols' value='{{ $rubrics->cols }}'>
                        <button class='btn-danger btn-sm' type='submit' name='delete_row'><i class='fa fa-minus-square-o'></i>&nbsp;&nbsp;Remove row</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection