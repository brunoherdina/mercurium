@extends('layouts.operacional')

@section('title', 'Meus checklists')

@section('menu')

@endsection
<link  rel="stylesheet" href="{{ asset('css/operacional/meusChecklists.css') }}">
@section('content')
    <div class="row">
        <div class="col">
            <div class="page-title">Meus checklists</div>
        </div>
    </div>
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
    <div class="row" class="searchChecklist">
        <div class="col">
            <input type="text" name="buscaChecklist"  placeholder="Buscar checklist..." id="campoBusca">
            <img id="searchIcon" src="{{ URL::asset('assets/icons/search-icon.png') }}">
        </div>
    </div>

    <table class="table table-bordered tabela-checklists">
        <tr>
            <th>Frota</th>
            <th>Data</th>
            <th></th>
        </tr>
        @foreach($meusChecklists as $mc)
        <form method="GET" id="formExibir" action="{{ route('operacional.showChecklist',  ['id'=>$mc->id] ) }}">
            <tr class="mChecklists">
                <td class="tdChecklist1">{{$mc->name}}</td>
                <td class="tdChecklist1">{{$mc->created_at}}</td>
                <td class="tdChecklist2"><button type="submit" class="btn btn-primary exibir">Exibir</button></td>
            </tr>
        </form>
        @endforeach
        
    </table>
        <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/operacional.checklists.js') }}"></script>
@endsection