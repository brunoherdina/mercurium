@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
<style>
    #searchIcon{
    margin-left:10px;
    width:40px;
    height:40px;
    }

    #busca{
        width:300px;
    }

    #formBusca{
        text-align: center;
        margin-top:13px;
        margin-bottom:30px;
    }

    .salvar{
        margin-left:10px;
    }

    .ladoEsquerdo{
        border-right:2px solid green;
        margin-left:30px;
        float: left;
        max-width: 47%;
    }

    .ladoDireito{
        float:right;
        max-width: 47%;
    }

    #version{
        margin-left:15px;
    }
</style>
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
    <div class="alert alert-warning" style="text-align:center;height:68px;margin:0px;line-height:1px;">
            <ul style="list-style: none; padding: 0;">
                <li>Selecione as perguntas cadastradas no sistema na parte esquerda da tela clicando no botão com o simbolo 
                                <span class="fa fa-plus-circle" style="width:30px;height:30px;"></span>
                                <br/>Na parte direita da tela encontram-se as perguntas que serão salvas na versão que você está criando.</li>
            </ul>
        </div>

    <h3 style="text-align:center;"><strong>Cadastro de Checklist</strong></h3><br/><br/>
    <div class="container ladoEsquerdo">
        <div class="row">
            <form method="GET" action="#" class="form-inline" id="formBusca">
                {{ csrf_field() }}
                <div class="form-group mb-2">
                    <input type="text"  class="form-control-plaintext" id="busca" name="busca" placeholder="Buscar pergunta...">
                </div>
                <div class="form-group mb-2">
                    <input type="image" id="searchIcon" name="pesquisar" src="{{ URL::asset('assets/icons/search-icon.png') }}">
                </div>
            </form>
        </div>
        <div class="row">
            <table id="cadastradas" class="table table-hover">
                <thead>
                    <tr>
                        <th>Perguntas cadastradas</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ( $questions as $q )
                        <tr>
                            <td>
                                <input id="question" readonly name="question" value="{{ $q->name }}" style="border:none;background:transparent;width:100%;">
                            </td>
                            <td style="float:right;">
                            <button class="btn btn-success add_button" type="button">
                                <span class="fa fa-plus-circle"></span>
                            </button>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container ladoDireito">
        <form method="POST" action="#" id="#formCadastro">
            <div class="form-group row">
                <label for="version" class="col-sm-2 col-form-lavel">Versão:</label>
                <input type="text" name="version" id="version">
                <input class="btn btn-primary salvar" type="submit" value="Finalizar e salvar"> 
            </div>
            <div class="form-group row">
                <label for="equipament_type_id" class="col-sm-2 col-form-label">Categoria:</label>
                <div class="col-sm-2">
                    <select name="equipament_type_id" class="custom-select mr-sm-2">
                        <option selected>Selecione...</option>
                        @foreach($tipos as $t)
                        <option value="{{$t->id}}">{{ $t->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <table id="modelo" class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Perguntas deste checklist</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </form>
    </div>




    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script>
    $('.add_button').click(function () {
        var el = $('#question');
        var value = el.attr('value');

        if (value) {
           $('#modelo').append('<tr><td><input type="hidden" name="questions[]" value="' + value + '" >' + value + '<button class="btn btn-danger delete_button" type="button"style="float:right; data-question="' + value + '">Apagar</button> </td></tr>');
        }
});


    </script>

@stop