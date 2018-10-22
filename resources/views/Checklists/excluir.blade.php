@extends('adminlte::page')

@section('title', 'Equipamentos')

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
    <h3><strong>Checklists</strong></h3><br/><br/>
    <div class="row">
        <label for="categoria" class="col-sm-2 col-form-label"> Categoria</label>
                    <div class="col-sm-3">
                        <select name="categoria" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                            <option selected>Selecione...</option>
                            @foreach($tipos as $t)
                            <option value="{{$t->id}}">{{ $t->type }}</option>
                            @endforeach
                        </select>
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
        