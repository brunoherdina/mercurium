@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
<style>
    #searchIcon{
    margin-left:10px;
    width:40px;
    height:40px;
}

    #busca{
        width:300px;
    }
    form{
        margin:0px;
        padding:0px;
    }

    .ladoEsquerdo{
        margin-left:30px;
        float: left;
        max-width: 40%;
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

    <h3 style="text-align:center;"><strong>Cadastro de Checklist</strong></h3><br/><br/>
    <div class="container ladoEsquerdo">
        <div class="row">
            <form method="GET" action="#" class="form-inline">
                <div class="form-group mb-2">
                    <input type="text"  class="form-control-plaintext" id="busca" name="busca" placeholder="Buscar pergunta...">
                </div>
                <div class="form-group mb-2">
                    <input type="image" id="searchIcon" name="pesquisar" src="{{ URL::asset('assets/icons/search-icon.png') }}">
                </div>
            </form>
        </div>
        <div class="row">
            <h4>Perguntas cadastradas</h4>
        </div>
        <div class="row">
            <table id="cadastradas" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Itens</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ( $questions as $q )
                        <tr>
                            <td>{{ $q->name }}  </td>
                            <td style="float:right;">
                            <button class="btn btn-danger delete_button" type="button">Deletar</button>
                            </td>
                        </tr>

                        @empty
                            <p>Nenhuma Categoria Cadastrada</p>
                        @endforelse
                </tbody>
            </table>
        </div>




    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script>
    $('#adicionar').click(function () {
        var el = $('#pergunta');
        var value = el.val();

        if (value) {
           $('#tabela').append('<tr><td><input type="hidden" name="questions[]" value="' + value + '" >' + value + '<button class="btn btn-danger delete_button" type="button"style="float:right; data-question="' + value + '">Apagar</button> </td></tr>');
           $('#pergunta').val("");
        }
});

    $('#table').on('click', '.delete_button', function(e){
        $(this).closest('tr').remove();
    });

    </script>

@stop