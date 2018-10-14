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

    <div class="container" style="margin-top:70px;margin-left:210px;">
        <h2 style="margin-left:202px;">Editar Equipamento</h2><br/><br/>

        <form method="POST" action="{{ route('equipament.update', ['id'=>$e->id]) }}">
        {{ csrf_field() }}
        <div class="form-group row">
        <label for="frota" class="col-sm-2 col-form-label">Frota</label>
            <div class="col-sm-3">
                <input type="text" name="name" class="form-control" id="frota" value="{{$e->name}}">
            </div>
        </div>
        <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label">Horimetro/KM</label>
            <div class="col-sm-3">
                <input type="text" name="status" class="form-control" id="status" value="{{$e->status}}">
            </div>
        </div>
        <div class="form-group row">
        <label for="equipament_type_id" class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-sm-3">
                <select name="equipament_type_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Selecione...</option>
                    @foreach($tipos as $t)
                    <option value="{{$t->id}}">{{ $t->type }}</option>
                    @endforeach
                 </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <input type="submit" value="Alterar" class="btn btn-warning botao" style="margin-top:20px;">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <a type="button" class="btn btn-primary botao" href="{{route ('equipament.list')}}" >Voltar</a>
            </div>
        </div>
        </form>
</div>

@stop