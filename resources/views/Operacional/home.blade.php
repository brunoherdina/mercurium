<link rel="stylesheet" href="{{ asset('css/operacional/home.css') }}">
<link  rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<title>Mercurium - Operacional</title>
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
        <div class="row" class="searchChecklist">
            <div class="col">
                <input type="text" name="buscaChecklist"  placeholder="Buscar checklist..." id="campoBusca">
                <img id="searchIcon" src="{{ URL::asset('assets/icons/search-icon.png') }}">
            </div>
        </div>

        <table class="table table-bordered tabela-checklists">
            <tr>
                <th>Frota</th>
                <th>Data</th>
                <th></th>
            </tr>
            @foreach($meusChecklists as $mc)
            <form method="GET" id="formExibir" action="{{ route('operacional.showChecklist',  ['id'=>$mc->id] ) }}">
                <tr class="mChecklists">
                    <td class="tdChecklist1">{{$mc->name}}</td>
                    <td class="tdChecklist1">{{$mc->created_at}}</td>
                    <td class="tdChecklist2"><button type="submit" class="btn btn-primary exibir">Exibir</button></td>
                </tr>
            </form>
            @endforeach
        </table>
    </fieldset>

     <fieldset id="fs2">
        <div class="row">
            <div class="col">
                <div class="page-title">Novo checklist</div>
            </div>
        </div>

        <form method="post" action="{{ route('operacional.storeChecklist') }}">
            <div class="selecaoFrota">
                <label for="frota" id="labelFrota">Frota:</label>
                <select name="frota" id="frota">
                    <option selected >Selecione...</option>
                    @foreach($equipaments as $e)
                    <option value="{{$e->id}}" data-km="{{$e->km}}">{{ $e->name }}</option>
                    @endforeach
                </select>
                <hr>
            </div>
            <div class="horimetros">
                <div class="row-horimetro">
                    <label for="hInicial" id="labelInicial">Horímetro/KM Inicial:</label>
                    <input type="text" name="hInicial" id="initial" value="" readonly>
                </div>
                <div class="row-horimetro final">
                    <label for="hFinal" id="labelFinal">Horímetro/KM Final:</label>
                    <input type="text" name="hFinal">
                </div>
            </div>
            <div class="questions">
                <table class="table table-bordered">
                    <p id="tableTitle">Avalie os itens abaixo</p>
                    @foreach ($perguntas as $q)
                    <tr>
                        <input type="hidden" name="questions[]" value="{{$q->id}}">
                        <td>{{$q->name}}</td>
                        <td>
                            <select class="respostas" name="answers[]">
                                <option selected>Resposta...</option>
                                <option value="0">Bom</option>
                                <option value="1">Regular</option>
                                <option value="2">Ruim</option>
                                <option value="3">N/A</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="condicao">
                Avaliação final:
                <select class="parecer" name="parecerFinal">
                    <option selected>Resposta...</option>
                    <option value="0">Apto ao trabalho</option>
                    <option  value="1">Não apto ao trabalho</option>
                </select>
            </div>
            <div class="observacao">
                <textarea name="observacao" placeholder="Área para informações adicionais" class="obTextArea"></textarea>
                <input type="hidden" value="{{$checklist->id}}" name="checklist_id"> 
            </div>
            <button class="btn btn-primary salvar" type="submit">Salvar checklist</button>
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
    <script type="text/javascript" src="{{ URL::asset('js/angular.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/operacional.js') }}"></script>