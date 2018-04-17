@extends('adminlte::page')

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Progress</strong></h3>
        </div>

        <div class="box-body">
            <a href="" class="btn btn-primary btn-xs" id='1'>BLOK 1</a>
            <a href="" class="btn btn-primary btn-xs" id='2'>BLOK 2</a>
            <a href="" class="btn btn-primary btn-xs" id='3'>BLOK 3</a>
            <a href="" class="btn btn-primary btn-xs" id='4'>BLOK 4</a>
        
            <div class="x_content" id="table">  
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Course name</th>
                            <th>Grade</th>
                            <th>EC</th>
                        </tr>
                    </thead>

                    <tbody>
                            <!-- @Foreach-loop, create table row with data for each course-->
                            <tr>
                                <td>AAAAA</td>
                                <td>##</td>
                                <td>##</td>    
                            </tr>
                            <!-- @endforeach-->
                    </tbody>    

                </table>
            </div>
        </div>
    </div>

@endsection

@push('js')
<script>


</script>
@endpush