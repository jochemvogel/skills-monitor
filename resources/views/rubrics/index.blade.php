@extends('adminlte::page')

@section('content_header')
    <h1> Index rubrics</h1>
@endsection


@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of all the rubrics</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="example1_length">
                            <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                    <option value="10">10</option><option value="25">25</option><option value="50">50</option>
                                    <option value="100">100</option></select> entries</label></div></div>
                    <div class="col-sm-6"><div id="example1_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 297px;">Course name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 361px;">Rubric name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 323px;">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 257px;">Date created</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 191px;">View</th>
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

                                        {{--{{route('rubrics.show',['id' => session('id')])}} {{ $rubric->id }}--}}
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
