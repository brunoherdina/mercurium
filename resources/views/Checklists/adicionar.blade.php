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
        margin-left:20px; 
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

    <div class="container" style="margin-left:210px;max-width:1000px;">
        <h3 style="margin-left:210px;"><strong>Cadastro de Checklist</strong></h3><br/><br/>
        <form method="POST" action="">
            {{ csrf_field() }}
            <div class="form-group row">
                <input type="text" name="question[]" id="pergunta" placeholder="Digite a pergunta...">
                <button class="btn btn-primary" id="adicionar" type="button"><span class="fa fa-plus-circle"></span>Adicionar</button>
            </div>
            <div class="form-group row">
            <table id="table" class="table table-hover">
                    <thead>
                    <tr>
                    <th>ID</th>
                    <th>Pergunta</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group row">
            <label for="categoria" class="col-sm-2 col-form-label">Selecionar Categoria</label>
                <div class="col-sm-3">
                    <select name="categoria" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                        <option selected>Selecione...</option>
                        @foreach($tipos as $t)
                        <option value="{{$t->id}}">{{ $t->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

    <script>
    // var table = $('table');
    // $('adicionar').on('click', function () {
    //     var el = $(this);
    //     var value = el.val();

    //     if (pergunta) {
    //         table.find('tbody').append('<tr><td><input type="hidden" name="questions[]" value="' + pergunta + '" >\' + value + \'</td></tr>')
    //     }
    // });

        var question = '<br><input name="items[]" placeholder="digite o item">';
    $('adicionar').click(function(){
    $('form').append(question);
    return false;
})
    </script>

@stop