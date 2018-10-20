@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<style>
    .row{
        padding-top:15px;
    }
    span{
        padding-right:10px;
    }

    #pergunta{
        width:450px;
    }

    #adicionar{
        width:122px;
        margin-left:10px; 
    }
    .delete_button{
        width:122px;
    }
    form{
        margin:0px;
        padding:0px;
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

    <div class="container" style="max-width:900px;margin-left:200px;">
        <h3 style="text-align:center;"><strong>Cadastro de Checklist</strong></h3><br/><br/>
        <form method="POST" action="">
            {{ csrf_field() }}
            <div class="form-group row">
            <label for="categoria" class="col-sm-2 col-form-label"> Categoria</label>
                <div class="col-sm-3">
                    <select name="categoria" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                        <option selected>Selecione...</option>
                        @foreach($tipos as $t)
                        <option value="{{$t->id}}">{{ $t->type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="submit" value="Finalizar e salvar" class="btn btn-primary" style="float:right;"> 
                </div>
            </div>
            <div class="form-group row">
                <input type="text" name="questions[]" id="pergunta" value="" placeholder="Digite aqui os itens do checklist...">
                <button class="btn btn-success" id="adicionar" type="button"><span class="fa fa-plus-circle"></span>Adicionar</button>
            </div>
            <div class="form-group row">
            <table id="table" class="table table-hover" style="max-width:595px;">
                    <thead>
                    <tr>
                    <th>Item</th>
                    </tr>
                    </thead>
                    <tbody id="tabela">
                       
                    </tbody>
                </table>
            </div>
           

        </form>
    </div>




    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script>
    var table = $('#table');
    $('#adicionar').click(function () {
        var el = $('#pergunta');
        var value = el.val();

        if (value) {
           $('#tabela').append('<tr><td><input type="hidden" name="questions[]" value="' + value + '" >' + value + '<button class="btn btn-danger delete_button" type="button"style="float:right; data-question="' + value + '">Apagar</button> </td></tr>');
           $('#pergunta').val("");
        }
});

    </script>

@stop