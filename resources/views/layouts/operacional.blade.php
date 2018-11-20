<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/operacional/home.css') }}">
        <link  rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <title>Mercurium - @yield('title')</title>
    </head>
<body>
    @section('menu')
    <div class="menu">
        <ul>
            <li>
                <a id="item1" href="{{ route('operacional.myChecklists') }}"><img class="icon" id="icon1" src="{{ URL::asset('assets/icons/checklist-icon.png')}}"></a>
            </li>

        <li>
            <a id="item2" href="{{ route('operacional.newChecklist') }}"><img class="icon" id="icon2" src="{{ URL::asset('assets/icons/new-icon.png') }}"></a>
            </li>
            <li>
                <a id="item3" href="{{ route('operacional.profile') }}"><img class="icon" id="icon3" src="{{ URL::asset('assets/icons/user-icon.png') }}"></a>
            </li>
            <li>
                <a id="item4" href="{{ route('operacional.info') }}"><img class="icon" id="icon4"  src="{{ URL::asset('assets/icons/help-icon.png') }}"></a>
            </li>
        </ul>
    </div>
    <div class="conteudo">
        @yield('content')
    </div>
    <script type="text/javascript" src="{{ URL::asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/angular.min.js') }}"></script>
</body>
</html>

    