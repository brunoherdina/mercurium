@extends('layouts.operacional')

@section('title', 'Meus checklists')

@section('menu')

@endsection
<link  rel="stylesheet" href="{{ asset('css/operacional/exibirChecklist.css') }}">

@section('content')
    <div class="row">
        <div class="col">
            <div class="page-title">Exibir checklist</div>
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
        <div class="col info">
            Observações: {{$checklist->observacoes}}
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table-striped perguntas">
                <tr>
                    <th>Itens</th>
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
    <div class="row">
        <div class="col">
            <a class="btn btn-primary voltar" href="{{route('operacional.myChecklists')}}">Voltar</a> 
        </div>
    </div>
   
@endsection