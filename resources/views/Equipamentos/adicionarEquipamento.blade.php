@extends('adminlte::page')

@section('title', 'Equipamentos')

@section('content_header')
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

    @if (\Session::has('id'))
    teste


    @else
    <div class="container" style="margin-top:70px;margin-left:210px;">
        <h4 style="margin-left:220px;">Cadastro de Equipamentos</h4></br></br>

        <form method="POST" action="/addEquipament">
        {{ csrf_field() }}
        <div class="form-group row">
        <label for="frota" class="col-sm-2 col-form-label">Frota</label>
            <div class="col-sm-3">
                <input type="text" name="name" class="form-control" id="frota" value="">
            </div>
        </div>
        <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label">Horimetro/KM</label>
            <div class="col-sm-3">
                <input type="text" name="status" class="form-control" id="status">
            </div>
        </div>
        <div class="form-group row">
        <label for="equipament_type_id" class="col-sm-2 col-form-label">Tipo</label>
            <div class="col-sm-3">
                <select name="equipament_type_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Selecione...</option>
                    @foreach($tipos as $t)
                    <option value="{{$t->id}}">{{ $t->name }}</option>
                    @endforeach
                 </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <input type="submit" value="Salvar" class="btn btn-primary" style="width:263px;height:40px;margin-left:196px;margin-top:20px;">
            </div>
        </div>
        </form>
</div>
    @endif

@stop