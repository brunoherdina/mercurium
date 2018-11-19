@extends('layouts.operacional')

@section('title', 'Novo checklist')

@section('menu')

@endsection
<link rel="stylesheet" href="{{ asset('css/operacional/novo.css') }}">
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
        <div class="row">
            <div class="col">
                <div class="page-title">Novo checklist</div>
            </div>
        </div>

        <form method="post" action="{{ route('operacional.storeChecklist') }}">
            <div class="selecaoFrota">
                <label for="frota" id="labelFrota">Frota:</label>
                <select name="frota" id="frota">
                    <option selected >Selecione...</option>
                    @foreach($equipaments as $e)
                    <option value="{{$e->id}}" data-km="{{$e->km}}">{{ $e->name }}</option>
                    @endforeach
                </select>
                <hr>
            </div>
            <div class="horimetros">
                <div class="row-horimetro">
                    <label for="hInicial" id="labelInicial">Horímetro/KM Inicial:</label>
                    <input type="text" name="hInicial" id="initial" value="" readonly>
                </div>
                <div class="row-horimetro final">
                    <label for="hFinal" id="labelFinal">Horímetro/KM Final:</label>
                    <input type="text" name="hFinal">
                </div>
            </div>
            <div class="questions">
                <table class="table table-bordered">
                    <p id="tableTitle">Avalie os itens abaixo</p>
                    @foreach ($perguntas as $q)
                    <tr>
                        <input type="hidden" name="questions[]" value="{{$q->id}}">
                        <td>{{$q->name}}</td>
                        <td>
                            <select class="respostas" name="answers[]">
                                <option selected>Resposta...</option>
                                <option value="1">Bom</option>
                                <option value="2">Regular</option>
                                <option value="3">Ruim</option>
                                <option value="4">N/A</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="condicao">
                Avaliação final:
                <select class="parecer" name="parecerFinal">
                    <option selected>Resposta...</option>
                    <option value="1">Apto ao trabalho</option>
                    <option  value="0">Não apto ao trabalho</option>
                </select>
            </div>
            <div class="observacao">
                <textarea name="observacao" placeholder="Área para informações adicionais" class="obTextArea"></textarea>
                <input type="hidden" value="{{$checklist->id}}" name="checklist_id"> 
            </div>
            <button class="btn btn-primary salvar" type="submit">Salvar checklist</button>
        </form>

        <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/operacional.novo.js') }}"></script>
@endsection