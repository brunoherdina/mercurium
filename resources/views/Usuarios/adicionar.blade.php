@extends('adminlte::page')

@section('title', 'Usuários')

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

    <div class="container" style="margin-top:70px;margin-left:210px;">
        <h3 style="margin-left:185px;"><strong>Cadastro de Usuários</strong></h3></br></br>

        <form method="POST" action="{{route('user.add')}}">
        {{ csrf_field() }}
        <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-3">
                <input type="text" name="name" class="form-control" id="name">
            </div>
        </div>
        <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-3">
                <input type="email" name="email" class="form-control" id="email">
            </div>
        </div>
        <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-3">
                <input type="login" name="login" class="form-control" id="login">
            </div>
        </div>
        <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Senha</label>
            <div class="col-sm-3">
                <input type="password" name="password" class="form-control" id="email">
            </div>
        </div>
        <div class="form-group row">
        <label for="repassword" class="col-sm-2 col-form-label">Repita sua senha</label>
            <div class="col-sm-3">
                <input type="repassword" name="repassword" class="form-control" id="repassword">
            </div>
        </div>
        <div class="form-group row">
        <label for="employee_position_id" class="col-sm-2 col-form-label">Nivel de acesso</label>
            <div class="col-sm-3">
                <select name="employee_position_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Selecione...</option>
                    @foreach($niveis as $n)
                    <option value="{{$n->id}}">{{ $n->name }}</option>
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

@stop