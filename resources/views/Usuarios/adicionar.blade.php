@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<link rel="stylesheet" href="{{ asset('css/usuarios/adicionarUsuario.css') }}">
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
        <h3><strong style="margin-left: 40px;">Cadastro de Usuários</strong></h3><br/><br/>

        <form method="POST" action="{{route('user.add')}}">
            {{ csrf_field() }}

            <div class="row">
                    <label for="name">Nome: </label>
                    <input type="text" name="name" id="name" required> 
            </div>

            <div class="row">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" required>
            </div>

            <div class="row">
                    <label for="status">Matrícula: </label>
                    <input type="text" name="matricula" id="matricula" required>
            </div>

             <div class="row selects">
                <label for="employee_position_id">Nivel de acesso: </label>
                <select name="employee_position_id" class="opcoes" required id="nivelSelect">
                    <option selected>Selecione...</option>
                    @foreach($niveis as $n)
                    <option value="{{$n->id}}">{{ $n->type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row selects" id="equipamentoSelect">
                <label for="funcao">Equipamento: </label>
                <select name="categoria" class="opcoes">
                    <option selected>Selecione...</option>
                    @foreach($categorias as $c)
                    <option value="{{$c->id}}">{{ $c->type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <input type="submit" value="Salvar" class="btn btn-primary salvar">
            </div>
        </form>
    </div>

<script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/adicionarUser.js') }}"></script>
@stop