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
                    <tr>
                        <td class="categoriaT">{{ $c->type }}</td>
                        <td class="versaoT">{{ $c->version }}</td>
                        <td class="acoes">
                            <form id="deleteForm" method="POST" action="{{ route( 'checklist.destroy',  ['id'=>$c->id] )}}">
                                {{ csrf_field() }}
                                <button class="btn btn-danger delete_button acao" type="button">Excluir</button>
                            </form>
                            <form id="showForm" method="GET" action="{{ route('checklist.show', ['id'=>$c->id]) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-primary show_button acao" type="submit">
                                                Exibir
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>


   



@stop


    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/listarChecklists.js') }}"></script>