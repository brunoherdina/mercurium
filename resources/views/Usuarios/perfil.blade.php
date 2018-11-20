@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
<link rel="stylesheet" href="{{ asset('css/usuarios/perfil.css') }}">
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
    <div class="conteudo">
        <h2 id="titulo">Informações do usuário</h2>
        <div class="itens">
            <div class="row info">
                <label for="nome">Nome:</label>
                <span name="nome">{{$user->name}}</span>
            </div>
            <div class="row info">
                <label for="nome">Email:</label>
                <span name="nome">{{$user->email}}</span>
            </div>
            <div class="row info">
                <label for="nome">Matricula:</label>
                <span name="nome">{{$user->matricula}}</span>
            </div>

            <div class="row">
                <button class="btn btn-primary alterar">Alterar senha</button>
            </div>
        </div>

        <fieldset>

            <form method="POST">

                <div class="row senhaItens">
                    <label for="senhaAtual" class="senhas">Senha atual:</label>
                    <input type="password" name="senhaAtual">
                </div>

                <div class="row  senhaItens">
                    <label for="novaSenha1" class="senhas">Nova senha:</label>
                    <input type="password" name="novaSenha1">
                </div>

                <div class="row  senhaItens">
                    <label for="novaSenha2" class="senhas">Repita a senha:</label>
                    <input type="password" name="novaSenha2">
                </div>
            </form>

        </fieldset>
    </div>
@stop