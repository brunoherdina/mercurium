@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
<link rel="stylesheet"  src="{{ URL::asset('css/sweetalert2.min.css') }}">
<link rel="stylesheet"  href="{{ asset('css/equipamentos/addCategoria.css') }}">
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
        <h4 id="titulo">Nova categoria</h4><br/>

        <form method="POST" action="{{route('type.store')}}" id="formAdd">
            {{ csrf_field() }}
            <div class="form-group row">
                    <input type="text" name="type" class="form-control" id="type" required placeholder="Digite aqui o nome da categoria..."> 
            </div>
            <div class="form-group row">
                    <input type="submit" value="Adicionar" class="btn btn-primary">
            </div>
        </form>
        <div class="row">
                <table id="example2" class="table table-hover">
                    <thead>
                    <tr>
                    <th>Categoria</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ( $tipos as $t )
                        <tr>
                            <td>{{ $t->type }}  </td>
                            <td>
                                <div class="row">
                                    <form method="POST" action="{{ route('type.destroy', ['id'=>$t->id]) }}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger delete_button botao" type="button">Deletar</button> 
                                    </form>
                                    <a class="btn btn-warning edit_button botao" name="editar" href="{{ route('type.edit', ['id'=>$t->id]) }}">Editar</a><br/><br/>
                                </div>
                            </td>
                        </tr>

                        @empty
                            <p>Nenhuma Categoria Cadastrada</p>
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
		  title: "Você está prestes a excluir esta categoria. Deseja continuar?",
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
    
    </script>

@stop