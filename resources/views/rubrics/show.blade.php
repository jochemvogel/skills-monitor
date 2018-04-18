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
                    <tr id="row_{{$row->id}}">
                        <td>
                            {{-- #TODO make the buttons do something --}}
                            @if($rubrics->rowobjects->first()->id != $row->id)
                                <i class="fa fa-toggle-up"></i>
                                <br />
                            @endif
                            <i class="fa fa-trash"></i>
                            @if($rubrics->rowobjects->last()->id != $row->id)
                                <br />
                                <i class="fa fa-toggle-down"></i>
                            @endif
                        </td>
                        @foreach($row->fields as $field)
                            <td id="field_{{ $field->id }}">
                                {{  $field->content }}
                            </td>
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
@push('js')
    <script>
        document.addEventListener('click', function(){
            var elem = event.srcElement;
            var row = elem.parentElement.parentElement;
            console.log(row.id + "," + elem.id);
            if(row.id.substr(0,3) == "row"){
                var rowid = row.id.substr(4);
                switch(elem.classList[1]){
                    case "fa-toggle-up":
                        console.log("up");
                        //#TODO add ajax call to move row one up
                        break;
                    case "fa-trash":
                        console.log("delete");
                        //#TODO add ajax call to delete row
                        break;
                    case "fa-toggle-down":
                        console.log("down");
                        //#TODO add ajax call to move row one down
                        break;
                }
            }else if(elem.id.substr(0,5) == "field"){
                var field = document.getElementById(elem.id);
                var content = field.innerHTML;
                field.innerHTML = "<div id='newText' contenteditable='true'>" +
                    content +
                    "</div><div id='oldText' class='hidden'>" +
                    content +
                    "</div><button class='btn btn-success' id='safe'>Save</button>";
                document.getElementById("newText").focus();
            }
        });

        document.addEventListener('focusout', function (){
            var field = event.srcElement.parentElement;
            var oldContent = document.getElementById("oldText").innerHTML;
            var newContent = document.getElementById("newText").innerHTML;
            if (event.relatedTarget) {
                field.innerHTML = newContent;
            }else{
                field.innerHTML = oldContent;
            }

            //#TODO safe content to database w/ ajax call
        });
    </script>
@endpush