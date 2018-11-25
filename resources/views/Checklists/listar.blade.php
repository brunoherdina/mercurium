@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
<link  rel="stylesheet" href="{{ asset('css/listarChecklists.css') }}">
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
    <h3><strong>Checklists</strong></h3><br/><br/>

    <div class="row">
        <div class="col">
            <form class="form-inline" method="POST" action="{{ route('checklist.list') }}">
                {{ csrf_field() }}
                <div class="form-group mb-2">
                    <input type="text"  class="form-control-plaintext" id="busca" name="busca" placeholder="Pesquisar...">
                </div>
                <div class="form-group mb-2">
                    <input type="image" id="searchIcon" name="pesquisar" src="{{ URL::asset('assets/icons/search-icon.png') }}">
                </div>
            </form>
        </div>
    </div>

    <h2 class="tituloTabela" style="text-align:center;">Checklists em uso</h2>
    <div class="row tabela">
            <table class="table table-hover">
                <thead>
                <tr>
                <th>Categoria</th>
                <th>Versão</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($checklists as $c)
                    @if($c->in_use == 1)
                    <tr>
                        <td class="categoriaT">{{ $c->type }}</td>
                        <td class="versaoT">{{ $c->version }}</td>
                        <td class="acoes">
                            <form class="deleteForm" method="POST" action="{{ route( 'checklist.destroy',  ['id'=>$c->id] )}}">
                                {{ csrf_field() }}
                                <button class="btn btn-danger delete_button acao" type="button">Excluir</button>
                            </form>
                            <form class="showForm" method="GET" action="{{ route('checklist.show', ['id'=>$c->id]) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-primary show_button acao" type="submit">
                                                Exibir
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
            </tbody>
        </table>
    </div>

    <h2 class="tituloTabela" style="text-align:center;">Outros checklists</h2>
    <div class="row tabela">
            <table class="table table-hover">
                <thead>
                <tr>
                <th>Categoria</th>
                <th>Versão</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($checklists as $c)
                    @if($c->in_use == 0)
                    <tr>
                        <td class="categoriaT">{{ $c->type }}</td>
                        <td class="versaoT">{{ $c->version }}</td>
                        <td class="acoes">
                            <form class="deleteForm" method="POST" action="{{ route( 'checklist.destroy',  ['id'=>$c->id] )}}">
                                {{ csrf_field() }}
                                <button class="btn btn-danger delete_button acao" type="button">Excluir</button>
                            </form>
                            <form class="showForm" method="GET" action="{{ route('checklist.show', ['id'=>$c->id]) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-primary show_button acao" type="submit">
                                                Exibir
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
            </tbody>
        </table>
    </div>
</div>


   



@stop


    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/listarChecklists.js') }}"></script>