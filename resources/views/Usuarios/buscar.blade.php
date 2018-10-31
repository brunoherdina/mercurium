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

form{
    margin-bottom:20px;
}
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
<div class="container" style="max-width:1000px;text-align:center;">
    <h3><strong>Usuários</strong></h3><br/><br/>
    <div class="row">
        <div class="col">
            <form class="form-inline" method="POST" action="{{ route('user.search') }}">
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
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <table id="example2" class="table table-hover">
                    <thead>
                    <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Matrícula</th>
                    <th>Nível de acesso</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ( $resultados as $u )
                        <tr>
                            <td>{{ $u->name }}  </td>
                            <td>{{ $u->email }}</td>
                            <td> {{ $u->matricula }}</td>
                            <td> {{ $u->type }}</td>
                            <td style="float:right;">
                            <form method="POST" action="{{ route('user.destroy', ['id'=>$u->id]) }}">
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
		  text: "Você está prestes a excluir o usuário, deseja continuar?",
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
        