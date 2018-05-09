@extends('adminlte::page')

@section('title', 'Page not found')

@section('content')
    {{-- create a box for all the text--}}
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    Sorry, we couldn't find the page you were looking for
                </strong>
            </h3>
        </div>
        <div class="box-body">
            <p1>Congratulations, you are one of the few people who see this page.</p1>
            <br><br>
            <p1>If you filled in the link manually please correct it and try again, if this doesn't work please contact us.<br>
                please contact us by mail if you came here trough a link we provided per mail, trough the menu or by one of our pages.<br>
                by contacting us please provide the following details:<br>
                <ul>
                    <li>the page you came from</li>
                    <li>where you clicked on the previous page before you came here</li>
                    <li>the version of the site listed below</li>
                </ul>
            </p1>
        </div>
    </div>
@endsection