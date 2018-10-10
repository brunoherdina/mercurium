@extends('adminlte::page')

@section('title', 'Equipamentos')

@section('content_header')
<link rel="stylesheet"  src="{{ URL::asset('css/sweetalert2.min.css') }}">
<style>
td button{
    width:100px;
}
td a{
    width:100px;
}
</style>
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
    <h3 style="text-aling:center;"><strong>Equipamentos</strong></h3><br/><br/>
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
                                <a class="btn btn-warning" name="editar" href="{{ route('equipament.edit', ['id'=>$eq->id]) }}">Editar</a><br/><br/>
                                <form method="POST" action="{{ route('equipament.destroy', ['id'=>$eq->id]) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-danger delete_button" type="button">Deletar</button> 
                                </form>
                                </td>
                            </tr>

                            @empty
                                <p>Nenhuma Categoria Cadastrada</p>
                            @endforelse
                            </tbody>
                        </table>
</div>
<script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/sweetalert2.all.min.js') }}"></script>
<script>
    $('.delete_button').on('click', function (event) {
        var button = $(this);
		var form = button.closest('form');
		
		swal({
		  title: 'Atenção',
		  text: "Você está prestes a excluir o equipamento, deseja continuar?",
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