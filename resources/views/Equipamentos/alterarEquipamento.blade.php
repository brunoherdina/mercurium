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
                                <td style="float:right;"><a class="btn btn-warning" name="editar" href="{{ route('equipament.edit', ['id'=>$eq->id]) }}">Editar</a><a class="btn btn-danger" href="equipament.edit/{{$eq->id}}" name="excluir" style="margin-left:10px;">Excluir</a></td>
                            </tr>
                            @empty
                                <p>Nenhuma Categoria Cadastrada</p>
                            @endforelse
                            </tbody>
                        </table>
</div>
@stop