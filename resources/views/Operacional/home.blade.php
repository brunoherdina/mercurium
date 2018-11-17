<link rel="stylesheet" href="{{ asset('css/operacional/home.css') }}">

<div class="container">
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