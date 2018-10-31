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
th{
    font-size:16px;
    width:200px;
    text-align:center;
}

td{
    font-size:14px;
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
<div class="container" style="max-width:800px;text-align:center;">
    <h3><strong>Equipamentos</strong></h3><br/><br/>
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
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
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
        </div>
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
        