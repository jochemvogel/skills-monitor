@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of all the rubrics  <a href="{{route('rubrics.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="example1_length">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                            <tr role="row">
                                <th>Course name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 361px;">Rubric name</th>
                                <th>ID</th>
                                <th>Date created</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rubrics as $rubric)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">SON1</td>
                                    <td>{{ $rubric->name }}</td>
                                    <td>{{ $rubric->id }}</td>
                                    <td>{{ $rubric->created_at }}</td>
                                    <td><a href="{{route('rubrics.update',['id' => $rubric->id])}}">View</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push ('js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
    });
</script>
@endpush

@push ('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush