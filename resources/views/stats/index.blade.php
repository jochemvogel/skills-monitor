@extends('adminlte::page')

@section('content')


    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Progress</strong></h3>
        </div>

        <div class="box-body">
            <div class="btn btn-primary btn-xs" id='blok1'>BLOK 1</div>
            <div class="btn btn-primary btn-xs" id='blok2'>BLOK 2</div>
            <div class="btn btn-primary btn-xs" id='blok3'>BLOK 3</div>
            <div class="btn btn-primary btn-xs" id='blok4'>BLOK 4</div>

            <div class="x_content" id="table">  
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Course name</th>
                            <th>Grade</th>
                            <th>EC</th>
                        </tr>
                    </thead>

                    <tbody id="tbody">

                    </tbody>

                </table>
            </div>

            <div class="x_content">
                <canvas id="line-chart" width="400" height="225"></canvas>
            </div>

        </div>
    </div>

@endsection

@push('js')
<script>

    var data = [];

    function callBack(response) {
            data = response;
            
            var length = data.length;
            var newData = [];

            for(var i = 0 ; i < length; i++){
            
                newData.push(data[i].grade);
            }            
            console.dir(newData);
        };

    window.addEventListener('click', function(){
        switch (event.srcElement.id) {
            case 'blok1':
                $.ajax({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                    type: "GET",
                    url: '/getstats',
                    data: {
                        'blok': '1'
                    }, success: function (data) {
                        callBack(data);
                        
                    }
                });
                
            break;

            case 'blok2':
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                     type: "GET",
                     url: '/getstats',
                     data: {
                        'blok': '2'
                     }, success: function (data) {
                        callBack(data);
                     }

                });
                
            break;

        }
    });

    

</script>
@endpush