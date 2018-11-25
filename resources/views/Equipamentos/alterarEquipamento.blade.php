@extends('adminlte::page')

@section('title', 'Equipamentos')

@section('content_header')
<link rel="stylesheet"  src="{{ URL::asset('css/sweetalert2.min.css') }}">
<link rel="stylesheet"  href="{{ asset('css/equipamentos/alterarEquipamentos.css') }}">

@stop
<style>

#busca{
    width:430px;
    height: 35px;
}

#searchIcon{
    margin-left:10px;
    width:50px;
    height:50px;
}

</style>

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
        <div class="col">
            <form class="form-inline" method="POST" action="{{ route('equipament.list') }}">
                {{ csrf_field() }}
                <div class="form-group mb-2">
                    <input type="text"  class="form-control-plaintext" id="busca" name="busca" placeholder="Pesquisar...">
                </div>
                <div class="form-group mb-2">
                    <input type="image" id="searchIcon" name="pesquisar" src="{{ URL::asset('assets/icons/search-icon.png') }}">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
            <h2 class="tableTitle">Equipamentos com defeito</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                    <th>Frota</th>
                    <th>Horímetro/KM</th>
                    <th>Categoria</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ( $equipamentos as $eq )
                    @if($eq->status == 0)
                        <tr>
                            <td>{{ $eq->name }}</td>
                            <td> {{ $eq->km }}</td>
                            <td>{{$eq->type}}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <form method="POST" action="{{ route('equipament.corrigir', ['id'=>$eq->id]) }}">
                                            {{csrf_field() }}
                                            <button class="btn btn-success botao corrigir" type="button">Defeito corrigido</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endif
                    
                        @empty
                            <p>Nenhuma equipamento cadastrado</p>
                        @endforelse
                    </tbody>
                </table>
        </div>

        <div class="row">
            <h2 class="tableTitle">Todos os equipamentos</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                    <th>Frota</th>
                    <th>Horímetro/KM</th>
                    <th>Categoria</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ( $equipamentos as $eq )
                        <tr>
                            <td>{{ $eq->name }}</td>
                            <td> {{ $eq->km }}</td>
                            <td>{{$eq->type}}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <form method="POST" action="{{ route('equipament.destroy', ['id'=>$eq->id]) }}">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger delete_button botao" type="button">Deletar</button> 
                                        </form>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-warning botao" name="editar" href="{{ route('equipament.edit', ['id'=>$eq->id]) }}">Editar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    
                        @empty
                            <p>Nenhuma equipamento cadastrado</p>
                        @endforelse
                    </tbody>
                </table>
        </div>
</div>
<script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/sweetalert2.all.min.js') }}"></script>
<script>
    $('.delete_button').on('click', function (event) {
        var button = $(this);
		var form = button.closest('form');
		
		swal({
		  title: 'Você está prestes a excluir este equipamento. Deseja continuar?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Sim',
		  cancelButtonText: 'Não'
		}).then((result) => {
		  if (result.value) {
			form[0].submit();
		  }
		})	;		
    });

    $('.corrigir').on('click', function (event) {
        var button = $(this);
		var form = button.closest('form');
		
		swal({
		  title: 'Remover este equipamento da lista de equipamentos com defeito?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Sim',
          cancelButtonText: 'Não',
          width: '400px',
		}).then((result) => {
		  if (result.value) {
			form[0].submit();
		  }
		})	;		
    });
    
    </script>
@stop
        