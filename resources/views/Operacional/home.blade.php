<link rel="stylesheet" href="{{ asset('css/operacional/home.css') }}">
<link  rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="menu">
                <ul>
                    <li>
                        <a id="item1"><img class="icon active" id="icon1" src="{{ URL::asset('assets/icons/checklist-icon.png')}}"></a>
                    </li>

                   <li>
                       <a id="item2"><img class="icon" id="icon2" src="{{ URL::asset('assets/icons/new-icon.png') }}"></a>
                    </li>
                    <li>
                        <a id="item3"><img class="icon" id="icon3" src="{{ URL::asset('assets/icons/user-icon.png') }}"></a>
                    </li>
                    <li>
                        <a id="item4"><img class="icon" id="icon4"  src="{{ URL::asset('assets/icons/help-icon.png') }}"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <fieldset id="fs1" class="visible">
        <div class="row">
            <div class="col">
                <div class="page-title">Meus checklists</div>
            </div>
        </div>
        <div class="row" class="searchChecklist">
            <div class="col">
                <input type="text" name="buscaChecklist"  placeholder="Buscar checklist..." id="campoBusca">
                <img id="searchIcon" src="{{ URL::asset('assets/icons/search-icon.png') }}">
            </div>
        </div>
    </fieldset>

     <fieldset id="fs2">
        <div class="row">
            <div class="col">
                <div class="page-title">Novo checklist</div>
            </div>
        </div>
        <form method="post">
            <div class="selecaoFrota">
                <label for="frota" id="labelFrota">Frota:</label>
                <select name="frota" id="frota">
                    <option selected>Selecione...</option>
                    @foreach($equipaments as $e)
                    <option value="{{$e->id}}">{{ $e->name }}</option>
                    @endforeach
                </select>
                <hr>
            </div>
            <div class="horimetros">
                <div class="row-horimetro">
                    <label for="hInicial" id="labelInicial">Horímetro/KM Inicial:</label>
                    <input type="text" name="hInicial" value="3427" readonly>
                </div>
                <div class="row-horimetro final">
                    <label for="hFinal" id="labelFinal">Horímetro/KM Final:</label>
                    <input type="text" name="hFinal">
                </div>
            </div>
            <hr>
            <div class="questions">
                <table class="table table-bordered">
                    <p id="tableTitle">Avalie os itens abaixo</p>
                    <tr>
                        <td>Nível da água do radiador</td>
                        <td>
                            <select class="respostas" name="questions[]">
                                <option selected>Resposta...</option>
                                <option value="0">Bom</option>
                                <option  value="1">Regular</option>
                                <option value="2">Ruim</option>
                                <option value="3">N/A</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nível do óleo de motor</td>
                        <td>
                            <select class="respostas" name="questions[]">
                                <option selected>Resposta...</option>
                                <option value="0">Bom</option>
                                <option  value="1">Regular</option>
                                <option value="2">Ruim</option>
                                <option value="3">N/A</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <button class="btn btn-primary">Salvar checklist</button>
        </form>
        
    </fieldset>

     <fieldset id="fs3">
        <div class="row">
            <div class="col">
                <div class="page-title">Perfil</div>
            </div>
        </div>
    </fieldset>

     <fieldset id="fs4">
        <div class="row">
            <div class="col">
                <div class="page-title">Informações</div>
            </div>
        </div>
    </fieldset>
</div>

    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/operacional.js') }}"></script>