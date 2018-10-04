@extends('adminlte::page')

@section('title', 'Equipamentos')

@section('content_header')
@stop

@section('content')
<div class="container" style="max-width:800px;">
    <h3 style="text-aling:center;">Editar equipamento</h3><br/><br/>
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
                                <td style="float:right;"><button class="btn btn-warning" name="editar">Editar</button><button class="btn btn-danger" name="excluir" style="margin-left:10px;">Excluir</button></td>
                            </tr>
                            @empty
                                <p>Nenhuma Categoria Cadastrada</p>
                            @endforelse
                            </tbody>
                        </table>
</div>
@stop