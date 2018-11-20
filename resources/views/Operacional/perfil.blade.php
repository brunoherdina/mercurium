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

                <div class="page-title">Perfil</div>

            <div class="info">
                Nome: {{$user->name}}
            </div>

            <div class="info">
                Email: {{$user->email}}
            </div>

            <div class="info">
                Equipamento: {{$equipament->type}}
            </div>
        
       

            <div class="info">
                Matricula: {{$user->matricula}}
            </div>

            <div class="info">
                <a class="btn btn-primary alterar" href="{{route('operacional.alterarSenha')}}">Alterar senha</a>
            </div>

            <div class="info">
                <a class="btn btn-primary alterar" href="{{route('logout')}}">Logout</a>
            </div>

        



        <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/operacional.perfil.js') }}"></script>
@endsection