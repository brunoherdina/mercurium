@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
<link  rel="stylesheet" href="{{ asset('css/exibirChecklistPreenchido.css') }}">
@stop
@section('content')
@if (\Session::has('success'))
        <div class="alert alert-success">
            <ul style="list-style: none; padding: 0;">
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    @if (\Session::has('error'))
        <div class="alert alert-danger">
            <ul style="list-style: none; padding: 0;">
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
    @endif
<div class="container">
    <h3 id="titulo"><strong>Checklist ID: {{$checklist->id}}</strong></h3><br/><br/>

    <div class="row">
        <div class="col info">
            Funcionário: {{$user->name}}
        </div>
    </div>
    <div class="row">
        <div class="col info">
            Frota: {{$checklist->name}}
        </div>
    </div>
    <div class="row">
        <div class="col info">
            Horímetro/KM inicial: {{$checklist->hInicial}}
        </div>
    </div>
    <div class="row">
        <div class="col info">
            Horímetro/KM final: {{$checklist->hFinal}}
        </div>
    </div>
    
    <div class="row">
        <div class="col info">
            Data: {{$checklist->created_at}}
        </div>
    </div>

    <div class="row">
        <div class="col info obs">
            Observações: {{$checklist->observacoes}}
        </div>
    </div>

<div class="tabelas">
    <div class="row">
        <div class="col">
            <table class="table-striped perguntas">
                <tr>
                    <th style="text-align: right;">Itens</th>
                </tr>
                @foreach($questions as $q)
                <tr>
                    <td>{{$q->name}}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="col">
            <table class="table-striped respostas">
                <tr>
                    <th>Respostas</th>
                </tr>
                @foreach($answer as $a)
                <tr>
                    <td>{{$a}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col voltar">
            <a class="btn btn-primary botao" href="{{route('checklist.preenchidos.list')}}">Voltar</a> 
        </div>
    </div>
</div>


   



@stop


    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/listarChecklists.js') }}"></script>