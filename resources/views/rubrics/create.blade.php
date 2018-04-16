@extends('adminlte::page')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    Create new rubrics
                </strong>
            </h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="{{ route('rubrics.store') }}" method="POST">
                @csrf
                <input type='hidden' name='rows' value='1'>
                <div class="box-body">
                    <div class="form-group">
                        <label for="Name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Columns" class="col-sm-2 control-label">Columns</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" min='1' max='10' step='1' name='cols' placeholder="6" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <input type='submit' class='btn btn-success btn-sm' value='Save'>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection