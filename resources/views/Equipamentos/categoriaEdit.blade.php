@extends('adminlte::page')

@section('title', 'Equipamentos')

@section('content_header')
<style>
    .botao{
        width:263px;
        height:40px;
        margin-left:196px;
        font-size:18px;
        font-weight:bold;
    }
</style>
@stop

@section('content')

    <div class="container" style="margin-top:70px;margin-left:210px;">
        <h2 style="margin-left:202px;">Editar Tipo</h2><br/><br/>

        <form method="POST" action="{{ route('equipamentType.update', ['id'=>$t->id]) }}">
        {{ csrf_field() }}
        <div class="form-group row">
        <label for="frota" class="col-sm-2 col-form-label">Tipo</label>
            <div class="col-sm-3">
                <input type="text" name="name" class="form-control" id="type" value="{{$t->type}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <a type="button" class="btn btn-primary botao" href="{{route ('equipamentTypes')}}" >Voltar</a>
            </div>
        </div>
        </form>
</div>

@stop