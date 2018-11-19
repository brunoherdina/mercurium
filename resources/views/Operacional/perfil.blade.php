@extends('layouts.operacional')

@section('title', 'Novo checklist')

@section('menu')

@endsection
<link rel="stylesheet" href="{{ asset('css/operacional/perfil.css') }}">
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

        <div class="row titulo">
            <div class="col">
                <div class="page-title">Perfil</div>
            </div>
        </div>

         <div class="row">
            <div class="col info">
                Nome: {{$user->name}}
            </div>
        </div>

        <div class="row">
            <div class="col info">
                Email: {{$user->email}}
            </div>
        </div>

        <div class="row">
            <div class="col info">
                Equipamento: {{$equipament->type}}
            </div>
        </div>
        
       

        <div class="row">
            <div class="col info">
                Matricula: {{$user->matricula}}
            </div>
        </div>

        <div class="row">
            <div class="col info">
                <a class="btn btn-primary alterar" href="{{route('operacional.alterarSenha')}}">Alterar senha</a>
            </div>
        </div>

        <div class="row">
            <div class="col info">
                <a class="btn btn-primary alterar" href="{{route('logout')}}">Logout</a>
            </div>
        </div>

        



        <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/operacional.perfil.js') }}"></script>
@endsection