@extends('adminlte::page')

@section('title', 'Checklists')

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
    <h3 style="text-align:center;"><strong>Cadastro de itens para checklist</strong></h3><br/><br/>
    <div class="container" style="max-width:900px;margin-left:210px;">
        
        <form method="POST" action="{{ route('question.store') }}">
            {{ csrf_field() }}
            <div class="form-group row">
                <input type="text" name="questions[]" id="pergunta" placeholder="Digite aqui o item...">
                <button class="btn btn-success" id="adicionar" type="button"><span class="fa fa-plus-circle"></span>Adicionar</button>
                <input type="submit" value="Finalizar e salvar" class="btn btn-primary"> 
            </div>
            <div class="form-group row">
            <table id="table" class="table table-hover" style="max-width:721px;">
                    <thead>
                    <tr>
                    <th></th>
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
    $('#adicionar').click(function () {
        var el = $('#pergunta');
        var value = el.val();

        if (value) {
           $('#tabela').append('<tr><td style="word-wrap:break-word;"><input type="hidden" name="questions[]" value="' + value + '">' + value + '<button class="btn btn-danger delete_button" type="button"style="float:right; data-question="' + value + '">Apagar</button> </td></tr>');
           $('#pergunta').val("");
        }
});

    $('#table').on('click', '.delete_button', function(e){
        $(this).closest('tr').remove();
    });

    </script>

@stop