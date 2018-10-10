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
                                <button class="btn btn-danger" data-id="{{$eq->id}}" data-name="teste" data-toggle="modal" data-target="#delete" style="margin-left:10px;">Excluir</button> 
                                </td>
                            </tr>

                            <!--Modal pra deletar equipamento-->
                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="text-align:center;">
                                        <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                        <h2 class="modal-title" id="myModalLabel">Excluir equipamento</h2>
                                                    </div>
                                                    <form action="{{route('equipament.destroy', 'id')}}" method="POST">
                                                    {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <h3>Você está prestes a excluir o equipamento:
                                                            <input type="text" name="name" id="name" value="">
                                                            <br/><br/>Deseja continuar?</h3><br/><br/>
                                                            <button data-dismiss="modal"class="btn btn-primary" name="voltar" style="width:100px;height:40px;">Voltar</button>
                                                            <button class="btn btn-danger" type="submit" name="excluir" style="width:100px;height:40px;margin-left:10px;" href="{{ route('equipament.destroy', ['id'=>$eq->id]) }}">Excluir</button>
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                </div>
                            @empty
                                <p>Nenhuma Categoria Cadastrada</p>
                            @endforelse
                            </tbody>
                        </table>
</div>
<script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script>
   jQuery('#delete').on('show.bs.modal', function (event) {
        console.log('Modal abriu')
        var button = jQuery(event.target);
		var form = button.closest('form')[0].submit();
    });
    
    </script>
@stop