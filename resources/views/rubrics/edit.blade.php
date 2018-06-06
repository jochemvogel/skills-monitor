@extends('adminlte::page')

@section('title', 'Rubrics: ' . $rubrics->name)

@section('content')
    {{-- create a box around the rubrics and it's name --}}
    <div class="box box-solid">
        <div class="box-header with-border">
            <h1 class="box-title">
                <strong id="rubric_name_{{ $rubrics->id }}">
                    {{-- show the name of the rubrics --}}
                    {{ $rubrics->name }}
                </strong>
            </h1>
        </div>
        <div class="box-body">
            {{-- make a table with the selected number of columns and rows --}}
            <table class='table table-striped table-bordered'>
                <thead>
                </thead>
                <tbody id="tbody">
                @foreach($rubrics->rowobjects as $row)
                    <tr id="row_{{$row->id}}" style="width: 100%;">
                        @can('update', $rubrics)
                            <td class="btn-group-vertical" style="width: 40px;">
                                @if($rubrics->rowobjects->first()->id != $row->id)
                                    <button class="btn btn-success btn-xs" style="float: left !important; padding: 0px;"><i class="fa fa-toggle-up" style="padding: 5px;"></i></button>
                                    <br />
                                @endif
                                    <button class="btn btn-danger btn-xs" style="float: left !important; padding: 0px;"><i class="fa fa-trash-o" style="padding: 5px;"></i></button>
                                @if($rubrics->rowobjects->last()->id != $row->id)
                                    <br />
                                        <button class="btn btn-success btn-xs" style="float: left !important; padding: 0px;"><i class="fa fa-toggle-down" style="padding: 5px;"></i></button>
                                @endif
                            </td>
                        @endcan
                        @foreach($row->fields as $field)
                            <td id="field_{{ $field->id }}" style="width: {{100/$row->fields->count()}}%;">
                                {{  $field->content }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <button class="btn btn-plus btn-primary btn-xs" id="{{$rubrics->id}}">
                <i class="fa fa-plus"></i> add row
            </button>
        </div>
    </div>
@endsection

@push('js')
    @can('update', $rubrics)
        <script>
            document.addEventListener('ready', function(){
                // #TODO remove divs from rubrics
            });

            document.addEventListener('click', function(){
                var elem = event.srcElement;
                var row = elem.parentElement.parentElement.parentElement;
                var csrf = $('meta[name="csrf-token"]').attr('content');
                console.log(row.id + "," + elem.id);
                if(row.id.substr(0,3) === "row"){
                    var rowid = row.id.substr(4);
                    switch(elem.classList[1]){
                        case "fa-toggle-up":
                            console.log("up");
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': csrf
                                },
                                type: "GET",
                                url: '/moverow',
                                data: {
                                    'id': rowid,
                                    'move': 'up'
                                },
                                success: function(data) { window.location.replace("/rubrics/"+data+"/edit"); }
                            });
                            break;
                        case "fa-trash-o":
                            console.log("delete");
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': csrf
                                },
                                type: "DELETE",
                                url: '/deleterow',
                                data: {
                                    'id': rowid
                                },
                                success: function(data) {
                                    window.location.replace("/rubrics/"+data+"/edit");
                                }
                            });
                            break;
                        case "fa-toggle-down":
                            console.log("down");
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': csrf
                                },
                                type: "GET",
                                url: '/moverow',
                                data: {
                                    'id': rowid,
                                    'move': 'down'
                                },
                                success: function(data) { window.location.replace("/rubrics/"+data+"/edit"); }
                            });
                            break;
                    }
                }else if(elem.id.substr(0,5) === "field"){
                    var field = document.getElementById(elem.id);
                    var content = field.innerText;
                    // remove Save from content
                    if (content.substr(content.length - 4) === "Save") {
                        content = content.substr(0, content.length - 5);
                    }
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': csrf
                        },
                        type: "GET",
                        url: '/getpendingfields',
                        data: {
                            'id': field.id.substr(6)
                        },
                        success: function (data) {
                            field.innerHTML = "<div id='newText' contenteditable='true'>" + data + "</div>";
                            field.innerHTML += "<div id='oldText' class='hidden'>" + content + "</div>";
                            field.innerHTML += "<button class='btn btn-success' id='safe_field'>Save</button>";
                            document.getElementById("newText").focus();
                        },
                        error: function () {
                            field.innerHTML = "<div id='newText' contenteditable='true'>" + content + "</div>";
                            field.innerHTML += "<div id='oldText' class='hidden'>" + content + "</div>";
                            field.innerHTML += "<button class='btn btn-success' id='safe_title'>Save</button>";
                            document.getElementById("newText").focus();
                        }
                    });
                }else if(elem.id.substr(0,11) === "rubric_name"){
                    var field = document.getElementById(elem.id);
                    var content = field.innerText;
                    if (content.substr(content.length - 4) === "Save") {
                        content = content.substr(0, content.length - 5);
                    }
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': csrf
                        },
                        type: "GET",
                        url: '/getpendingnames',
                        data: {
                            'id': field.id.substr(11)
                        },
                        success: function (data) {
                            field.innerHTML = "<div id='newText' contenteditable='true'>" + data + "</div>";
                            field.innerHTML += "<div id='oldText' class='hidden'>" + content + "</div>";
                            field.innerHTML += "<button class='btn btn-success' id='safe_title'>Save</button>";
                            document.getElementById("newText").focus();
                        },
                        error: function () {
                            field.innerHTML = "<div id='newText' contenteditable='true'>" + content + "</div>";
                            field.innerHTML += "<div id='oldText' class='hidden'>" + content + "</div>";
                            field.innerHTML += "<button class='btn btn-success' id='safe_title'>Save</button>";
                            document.getElementById("newText").focus();
                        }
                    });
                }else if(elem.classList[1] === 'btn-plus'){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': csrf
                        },
                        type: "PUT",
                        url: '/addrow',
                        data: {
                            'id': document.getElementsByClassName('btn-plus')[0].id
                        },
                        success: function(data) { window.location.replace("/rubrics/"+data+"/edit"); }
                    });
                }
            });

            document.addEventListener('focusout', function (){
                var field = event.srcElement.parentElement;
                var oldContent = document.getElementById("oldText").innerHTML;
                var newContent = document.getElementById("newText").innerHTML;
                if (event.relatedTarget) {
                    if(event.relatedTarget.id === "safe_field"){
                        field.innerHTML = newContent;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "PUT",
                            url: '/updatefield',
                            data: {
                                'id': field.id.substr(6),
                                'content': newContent
                            },
                            success: function() { console.info('success')}
                        });
                    }else{

                    }
                }else{
                    field.innerHTML = oldContent;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "PUT",
                        url: '/backupfield',
                        data: {
                            'id': field.id.substr(6),
                            'content': newContent
                        },
                        success: function() { console.info('success')}
                    });
                }
            });
        </script>
    @endcan
@endpush

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush