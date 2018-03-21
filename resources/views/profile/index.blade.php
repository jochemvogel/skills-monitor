@extends('adminlte::page')
<?php use Illuminate\Support\Facades\Auth; ?>
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h1>Profiel pagina</h1>
            </div>
        </div>
        
        @if(Auth::check())
            <div class="row">
                <div class="col-sm-5">
                    <p>Welkom <?php echo(Auth::user()->firstname.' '.Auth::user()->lastname); ?></p>
                </div>
        
                <div class="col-sm-8">
                    <p>Je email adres is: <?php echo(Auth::user()->email); ?>
                    Wil je dit veranderen? Klik dan <a href="users.index">hier</a>  </p>
                </div>
            </div>
         @endif

         @if(Auth::guest())
         <a href="/login" class="btn btn-info"> Je moet eerst inloggen om je profiel te kunnen zien! >></a>
         @endif
    </div>
    @endsection

