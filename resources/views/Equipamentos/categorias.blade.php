@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<link rel="stylesheet"  src="{{ URL::asset('css/sweetalert2.min.css') }}">
<style>
td button{
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

    <div class="container" style="margin-left:210px;">
        <h4 style="margin-left:285px;font-weight:bolder;" id="titulo">Novo tipo</h4><br/>

        <form method="POST" action="{{route('type.store')}}">
        {{ csrf_field() }}
        <div class="form-group row">
        <label for="tipo" class="col-sm-2 col-form-label" style="font-size:18px;">Tipo</label>
            <div class="col-sm-3">
                <input type="text" name="type" class="form-control" id="type" required> 
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <input type="submit" value="Salvar" class="btn btn-primary" style="width:263px;height:40px;margin-left:196px;margin-top:20px;">
            </div>
        </div>
        </form>
    </div>
    <div class="container" style="max-width:1000px;text-align:center;">
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <table id="example2" class="table table-hover">
                    <thead>
                    <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ( $tipos as $t )
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->type }}  </td>
                            <td style="float:right;">
                            <button class="btn btn-warning edit_button" name="editar" href="{{ route('type.edit', ['id'=>$t->id]) }}">Editar</button><br/><br/>
                            <form method="POST" action="{{ route('type.destroy', ['id'=>$t->id]) }}">
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
		  text: "Você está prestes a excluir esta categoria, deseja continuar?",
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