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
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 297px;">Course name</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 361px;">Rubric name</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 323px;">Creator</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 257px;">Date created</th><th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 191px;">Options</th></tr>
                            </thead>
                            <tbody>

                            <tr role="row" class="odd">
                                <td class="sorting_1">SON1</td>
                                <td>Name</td>
                                <td>Docent X</td>
                                <td>2018-04-19</td>
                                <td>Open rubric</td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">SAN1</td>
                                <td>Name</td>
                                <td>Docent X</td>
                                <td>2018-04-20</td>
                                <td>Open rubric</td>
                            </tr><tr role="row" class="odd">
                                <td class="sorting_1">SAN1</td>
                                <td>Name</td>
                                <td>Docent X</td>
                                <td>2018-04-30</td>
                                <td>Open rubric</td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">SON1</td>
                                <td>Name</td>
                                <td>Docent X</td>
                                <td>2018-05-03</td>
                                <td>Open rubric</td>
                            </tr><tr role="row" class="odd">
                                <td class="sorting_1">SBE1</td>
                                <td>Name</td>
                                <td>Docent X</td>
                                <td>2018-07-03</td>
                                <td>Open rubric</td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">IRE1</td>
                                <td>Name</td>
                                <td>Docent X</td>
                                <td>2018-11-14</td>
                                <td>Open rubric</td>
                            </tr><tr role="row" class="odd">
                                <td class="sorting_1">WEDTB2</td>
                                <td>Name</td>
                                <td>Docent X</td>
                                <td>2018-12-26</td>
                                <td>Open rubric</td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">WEDAG2</td>
                                <td>Name</td>
                                <td>Docent X</td>
                                <td>2018-12-26</td>
                                <td>Open rubric</td>
                            </tr><tr role="row" class="odd">
                                <td class="sorting_1">IRE1</td>
                                <td>Name</td>
                                <td>Docent X</td>
                                <td>2018-12-26</td>
                                <td>Open rubric</td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">SBE1</td>
                                <td>Name</td>
                                <td>Docent X</td>
                                <td>2018-12-26</td>
                                <td>Open rubric</td>
                            </tr></tbody>
                        </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
