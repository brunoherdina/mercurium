@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
<style>
    .container-fluid{
        margin-top:70px;
        margin-left:200px;
    }
    .botao{
        width:250px;
        margin-left:230px;
    }

    .row a{
        margin-top:5px;
    }
</style>
@stop

@section('content')

    <div class="container-fluid">
        <h2 style="margin-left:259px;">Editar Tipo</h2><br/><br/>

        <form method="POST" action="{{ route('type.update', ['id'=>$t->id]) }}">
        {{ csrf_field() }}
        <div class="form-group row justify-content-center">
        <label for="frota" class="col-sm-2 col-form-label">Tipo</label>
            <div class="col-sm-6">
                <input type="text" name="type" class="form-control" id="type" value="{{$t->type}}">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <div class="col">
                <input type="submit" class="btn btn-success botao"  value="Salvar">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <div class="col">
                <a class="btn btn-primary botao" href="{{route ('equipamentTypes')}}">Voltar</a>
            </div>
        </div>
        </form>
    </div>

@stop