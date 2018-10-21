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

    .perguntas{
        margin-bottom:10px;
        width:68%;
    }

    #adicionar{
        width:122px;
        margin-left:10px; 
    }
    .delete_button{
        margin-left:10px;
        width: 10%;
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
        <h3><strong>Cadastro de Checklist</strong></h3><br/><br/>
        <form method="POST" action="{{ route('checklist.store') }}">
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
                    <button class="btn btn-success" id="adicionar" type="button"><span class="fa fa-plus-circle"></span>Adicionar </button>
                </div>
                <div class="col-sm-3">
                    <input type="submit" value="Finalizar e salvar" class="btn btn-primary"> 
                </div>
            </div>
            <div class="form-group row inputs">
                <input class="perguntas" type="text" name="questions[]" placeholder="Digite aqui os itens do checklist...">
            </div>
        </form>
    </div>




    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script>
    
    var item = '<input type="text" class="perguntas" name="questions[]" placeholder="Digite aqui os itens do checklist..."><button class="btn btn-danger delete_button" type="button">Apagar</button>';
    $('#adicionar').click(function(){
    $('.inputs').append(item);
    $('.inputs').on('click', '.delete_button', function(e){
        $('.delete_button').closest('input').remove();
    });
    
    return false;
    });

    
    </script>
@stop