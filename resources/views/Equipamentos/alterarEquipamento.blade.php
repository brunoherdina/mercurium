@extends('adminlte::page')

@section('title', 'Equipamentos')

@section('content_header')
@stop

@section('content')

<script type="text/javascript">
            function Parametros(nome) {
                document.getElementById('nome').value = nome;
            }
</script>
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
<div class="container" style="max-width:800px;">
    <h3 style="text-aling:center;"><strong>Editar equipamento</strong></h3><br/><br/>
                        <table class="table table-striped table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Frota</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ( $equipamentos as $eq )
                            <tr>
                                <td>{{ $eq->id }}  </td>
                                <td>{{ $eq->name }}</td>
                                <td style="float:right;">
                                <a class="btn btn-warning" name="editar" href="{{ route('equipament.edit', ['id'=>$eq->id]) }}">Editar</a>
                                <button class="btn btn-danger" id="excluir" data-id='{{$eq->name|$eq->id}}' data-toggle="modal" data-target="#tela" data-cod="{{$eq->id}}" style="margin-left:10px;">Excluir</button> 
                                    <div class="modal fade" id="tela" style="text-align:center;">
                                        <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Excluir equipamento</h2>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>Você está prestes a excluir o equipamento:
                                                        <br/><br/>Deseja continuar?</h3><br/><br/>
                                                        <button data-dismiss="modal"class="btn btn-primary" name="voltar" style="width:100px;height:40px;">Voltar</button>
                                                        <button class="btn btn-danger" name="excluir" style="width:100px;height:40px;margin-left:10px;" href="{{ route('equipament.destroy', ['id'=>$eq->id]) }}">Excluir</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <p>Nenhuma Categoria Cadastrada</p>
                            @endforelse
                            </tbody>
                        </table>
</div>
@stop