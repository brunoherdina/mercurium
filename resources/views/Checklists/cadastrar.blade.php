@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
<link  rel="stylesheet" href="{{ asset('css/style.css') }}">
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

    <form id="formulario" method="POST">
        <ul id="progress">
            <li class="ativo">Versão</li>
            <li>Itens</li>
            <li>Concluir cadastro</li>
        </ul>
        <fieldset>
            <h4>Versão do checklist</h4>
            <div class="content-area">
                <div class="row">
                    <div class="col">
                    <label for="version">Versão:</label>
                    <input type="text" name="version" id="version" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="type">Categoria:</label>
                        <select name="type">
                            <option selected>Selecione...</option>
                            @foreach($tipos as $t)
                            <option value="{{$t->id}}" id="type">{{ $t->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <button class="botao botao1 acao next" id="primeiroBotao">Próximo</button>
                </div>
            </div>
        </fieldset>
        <fieldset id="segundaTela">
        <h3>Itens do checklist</h3>
            <div class="content-area">
                <div class="form-group row">
                    <input type="text" name="questions[]" id="pergunta" placeholder="Digite aqui o item...">
                    <button class="btn btn-success" id="adicionar" type="button"><span class="fa fa-plus-circle"></span></button>
                </div>
                <div class="form-group row">
                    <button class="botao botao2 acao prev">Anterior</button>
                    <button class="botao botao2 acao next">Próximo</button>
                </div>
                <div class="form-group row">
                    <div class="overflow">
                        <table id="table" class="table table-stripped">
                            <thead>
                            <tr>
                            <th>Itens</th>
                            </tr>
                            </thead>
                            <tbody id="tabela">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset id="terceiraTela">
            <h3>Verifique se os dados estão corretos</h3>
            <div class="content-area">
                <div class="form-group row">
                    <div class="col">
                    <label for="version">Versão:</label>
                    <span id="versaoSpan"></span>
                    <!-- <input type="text" name="version" value="V 1.0" id="version3"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="type">Categoria:</label>
                        <span id="catSpan"></span>
                        <!-- <select name="type">
                            <option selected>Selecione...</option>
                            
                        </select> -->
                    </div>
                </div>
                <div class="form-group row">
                    <button class="botao botao1 acao prev">Anterior</button>
                    <input type="submit" value="Cadastrar" class="botao botao1 acao next">
                </div>
                <div class="form-group row">
                    <div class="overflow">
                        <table id="table2" class="table table-stripped">
                            <thead>
                            <tr>
                            <th>Itens</th>
                            </tr>
                            </thead>
                            <tbody id="tabela2">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
        </fieldset>
    </form>

@stop


    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/formProgress.js') }}"></script>
    <script>

      $(document).on('click', '#adicionar', function () {
        var el = $('#pergunta');
        var value = el.val();

        if (value) {
           $('#tabela').append('<tr><td style="word-wrap:break-word;"><input type="hidden" name="questions[]" value="' + value + '">' + value + '<button class="btn btn-danger delete_button" type="button"style="float:right; data-question="' + value + '">Apagar</button> </td></tr>');
           $('#pergunta').val("");
        }

    $('#tabela').on('click', '.delete_button', function(e){
        $(this).closest('tr').remove();
    });

});


    </script>