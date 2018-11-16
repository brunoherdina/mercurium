@extends('adminlte::page')

@section('title', 'Equipamentos')

@section('content_header')
<link rel="stylesheet" href="{{ asset('css/equipamentos/editarEquipamento.css') }}">
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

    <div class="container">
        <div class="row">
            <h2>Editar Equipamento</h2><br/><br/>
        </div>

        <form method="POST" action="{{ route('equipament.update', ['id'=>$e->id]) }}">
        {{ csrf_field() }}

        <div class="row">
            <div class="col">
                <label for="frota">Frota</label>
            </div>
            <div class="col">
                <input type="text" name="name" class="form-control text-field" id="frota" value="{{$e->name}}">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="equipament_type_id">Categoria</label>
            </div>
            <div class="col">
                <select id="select" name="equipament_type_id">
                    <option selected>Selecione...</option>
                    @foreach($tipos as $t)
                    <option value="{{$t->id}}">{{ $t->type }}</option>
                    @endforeach
                 </select>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <input type="submit" value="Alterar" class="btn btn-warning botao">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a type="button" class="btn btn-primary botao" href="{{route ('equipament.list')}}" >Voltar</a>
            </div>
        </div>

        </form>
</div>

@stop