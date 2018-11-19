@extends('layouts.operacional')

@section('title', 'Novo checklist')

@section('menu')

@endsection
<link rel="stylesheet" href="{{ asset('css/operacional/perfil.css') }}">
@section('content')

        <div class="row titulo">
            <div class="col">
                <div class="page-title">Alterar senha</div>
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

         
        <form method="POST" class="formulario" action="{{ route('operacional.passwordUpdate', ['id'=>$user->id])}}">
            <div class="form-group-row">
                <label for="senhaAtual">Senha atual:</label>
                <input type="password" name="senhaAtual">
            </div>
            <div class="form-group-row">
                <label for="novaSenha1">Nova senha:</label>
                <input type="password" name="novaSenha1" id="senha1">
            </div>
            <div class="form-group-row">
                <label for="novaSenha2">Confirme a senha:</label>
                <input type="password" name="novaSenha2" id="senha2">
            </div>

            <div class="form-group-row">
                <input type="button" class="btn btn-primary alterar" value="Alterar" id="enviar">
            </div>

        </form>

        



        <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/operacional.perfil.js') }}"></script>
@endsection