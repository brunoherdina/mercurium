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
                        <td>
                            <button class="btn btn-danger delete_button acao">Excluir</button>
                            <button class="btn btn-primary show_button acao" data-toggle="modal" data-target="#modalExibir">
                                Exibir</button>
                        </td>
                    @endforeach
                </tbody>
            </table>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalExibir">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Informações do Checklist</h4>
            </div>
            <div class="modal-body">
                <div class="checklistInfo">
                    <div class="row">
                        Categoria:<span id="type"></span>
                    </div>
                    <div class="row">
                        Versão:<span id="version"></span>
                    </div>
                    <div class="row">
                        <table class="table table-hover" id="tableQuestions">
                            <thead>
                                <tr>
                                    <th>Itens</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>



@stop


    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/listarChecklists.js') }}"></script>