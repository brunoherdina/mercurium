@extends('adminlte::page')

@section('title', 'Equipamentos')

@section('content_header')
<link rel="stylesheet" href="{{ asset('css/equipamentos/adicionarEquipamento.css') }}">
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
        <h3><strong>Cadastro de Equipamentos</strong></h3><br/><br/>

        <form method="POST" action="{{route('equipament.add')}}">
        {{ csrf_field() }}
            <div class="row">
                <div class="col">
                    <label for="name">Frota: </label>
                </div>
                <div class="col">
                    <input type="text" name="name" class="form-control" id="frota" value="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="name">Horímetro/KM: </label>
                </div>
                <div>
                    <input type="text" name="km" class="form-control" id="km">
                </div>
            </div>
            <div class="row">
                <label for="equipament_type_id">Categoria: </label>
                <select name="equipament_type_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Selecione...</option>
                    @foreach($tipos as $t)
                    <option value="{{$t->id}}">{{ $t->type }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="row">
                <input type="submit" value="Salvar" class="btn btn-primary">
            </div>
        </form>
    </div>

@stop