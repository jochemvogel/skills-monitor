@extends('adminlte::page')

@section('title', 'Judgement: Show')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h1 class="box-title">
                <strong>
                    {{-- show the name of the rubrics --}}
                    {{ $judgement->rubrics->name }}
                </strong>
            </h1>
        </div>
        <div class="box-body">
            {{-- make a table with the selected number of columns and rows --}}
            <table class='table table-striped table-bordered'>
                <thead>
                </thead>
                <tbody id="tbody">
                @foreach($judgement->rubrics->rowobjects as $row)
                    <tr>
                        <td colspan="{{$judgement->rubrics->cols}}">
                            <div style="width: 101%; margin-left: -0.5%;">
                            <input style="width: 100%;" type="text" value="" class="slider form-control" data-slider-min="0" data-slider-max="100"
                                   data-slider-step="1" data-slider-value="50" data-slider-orientation="horizontal"
                                   data-slider-selection="before" data-slider-tooltip="show" data-slider-id="blue{{$row->id}}">
                            </div>
                        </td>
                    </tr>
                    <tr id="row_{{$row->id}}">
                        @foreach($row->fields as $field)
                            <td id="field_{{ $field->id }}">
                                {{  $field->content }}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="{{$judgement->rubrics->cols}}">
                            comments for this row please
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push ('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/bootstrap-slider.min.js"></script>
    <script>
        $(function () {
            /* BOOTSTRAP SLIDER */
            $('.slider').slider()
        });

        document.addEventListener('click', function(){
            if(event.srcElement.classList[0] === "slider"){
                changeColour(event.srcElement.children[0].children[1].getAttribute("style").substr(17,3), event.srcElement.children[0].children[1]);
            }else if(event.srcElement.classList[0] === "slider-handle"){
                changeColour(event.srcElement.parentElement.children[0].children[1].getAttribute("style").substr(17,3), event.srcElement.parentElement.children[0].children[1]);
            }
        })

        function changeColour(percent, elem){
            if(percent.substr(2) === "%"){
                percent = percent.substr(0,2);
            }else if(percent.substr(1) === "%;"){
                percent = percent.substr(0,1);
            }

            if(percent < 55){
                elem.setAttribute("style", "left: 0%; width:"+percent+"%; background: red")
            }else{
                elem.setAttribute("style", "left: 0%; width:"+percent+"%; background: green")
            }
        }

    </script>
@endpush

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/css/bootstrap-slider.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <style>
        .slider-selection{
            background: #3c8dbc;
        }
    </style>
@endpush