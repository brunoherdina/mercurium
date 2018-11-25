@extends('adminlte::page')

@section('title', 'Mercurium')

@section('content_header')
    <h1 style="text-align:center">Bem vindo ao Mercurium!</h1>
@stop
@section('content')
<div class="container">
<canvas id="grafico"></canvas>
</div>







<script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/Chart.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/controladorGrafico.js') }}"></script>

@stop