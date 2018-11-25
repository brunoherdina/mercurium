@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
<link  rel="stylesheet" href="{{ asset('css/exibirChecklist.css') }}">
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
    @if (\Session::has('warning'))
        <div class="alert alert-warning">
            <ul style="list-style: none; padding: 0;">
                <li>{!! \Session::get('warning') !!}</li>
            </ul>
        </div>
    @endif
<div class="container">
    @foreach ($checklist as $c)
    <div class="row info"> 
        Versão: {{$c->version}}
    </div>
    <div class="row info">
        Categoria: {{$c->type}}
    </div>
    @endforeach
    <div class="row">
        <form id="formDelete" method="POST" action="{{ route( 'checklist.destroy',  ['id'=>$c->id] )}}">
            {{ csrf_field() }}
            <a class="btn btn-primary" href="{{ route('checklist.list')}}">Voltar</a>
            <button class="btn btn-danger delete_button" type="button">Excluir</button>
        </form>
        <form id="formPadrao" method="POST" action="{{ route('checklist.inUse', ['id'=>$c->id])}}">
            {{ csrf_field() }}
            <button class="btn btn-success padrao" type="submit">Definir como padrão</a>
        </form>
       
    </div>

    <div class="row tabela">
            <table class="table table-hover">
                <thead>
                <tr>
                <th>Itens</th>  
                </tr>
                </thead>
                <tbody>
                   @foreach ($questions as $q)
                   <tr>
                        <td>{{ $q->name }}</td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
    </div>
</div>


   



@stop


    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/sweetalert2.all.min.js') }}"></script>
<script>
    $(function(){
	

    //Deletar checklist
    $('.delete_button').on('click', function (event) {
        var button = $(this);
		var form = button.closest('form');
		
		swal({
		  title: 'Atenção',
		  text: "Você está prestes à excluir este checklist, deseja continuar?",
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
});
</script>