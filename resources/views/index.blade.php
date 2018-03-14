@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Logged in successfully!</div>
                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @guest
                                please login to use the system!
                            @else
                                Welcome {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}!

                                <br> <br> You will be redirected within a few seconds..
                                <br> If you're not, click <a href="test">here</a> to continue.
                                You are logged in as {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}!
                                <script type="text/javascript"> setTimeout(function(){window.location='test'}, 4000); </script>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
