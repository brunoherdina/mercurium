@extends('layouts.operacional')

@section('title', 'Novo checklist')

@section('menu')

@endsection
<link rel="stylesheet" href="{{ asset('css/operacional/info.css') }}">
@section('content')

        <div class="row titulo">
            <div class="col">
                <div class="page-title">Informações</div>
            </div>
        </div>

        <div class="row texto">
            <div class="col">
                <span class="titulo">Mercurium</span>
            </div>
        </div>

        <div class="row texto">
            <div class="col">
                <p class="descricao">Mercurium é um projeto desenvolvido por Bruno Corrêa Herdina, aluno da escola Dr. Solon Tavares. O intuito deste sistema é facilitar a gestão de checklists de máquinas pesadas no ramo de logística, trazendo maior controle sobre a frota da empresa, bem como facilitando o acesso à informações específicas de cada equipamento.</p>
            </div>
        </div>

         <div class="row texto">
            <div class="col">
                <p class="contato">Contato: brunoherdina@outlook.com</p>
            </div>
        </div>

        



        <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/operacional.info.js') }}"></script>
@endsection