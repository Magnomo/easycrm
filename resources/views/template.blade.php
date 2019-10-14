<?php
$moduleInfo = [
    'icon' => 'store',
    'name' => 'Easycrm',
];
$menu = [
    ['icon' => 'shopping_basket', 'tool' => 'Produtos', 'route' => url('/produto')],
    ['icon' => 'menu', 'tool' => 'Categorias', 'route' => url('/categoria')],
    ['icon' => 'person', 'tool' => 'Usuários', 'route' => url('/usuario')],
    ['icon' => 'person', 'tool' => 'Clientes', 'route' => url('/cliente')],
    ['icon' => 'shopping_cart', 'tool' => 'Vendas   ', 'route' => url('/venda')],
    ['icon' => 'store', 'tool' => 'Estoque', 'route' => url('/estoque')],
    ['icon' => 'pie_chart', 'tool' => 'Relatórios', 'route' => url('/relatorio')],
    ['icon' => 'settings_applications', 'tool' => 'Configurações', 'route' => url('/settings')],
];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FreeERP @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        @keyframes swing {
            0% {
                transform: rotate(0deg);
            }

            10% {
                transform: rotate(10deg);
            }

            30% {
                transform: rotate(0deg);
            }

            40% {
                transform: rotate(-10deg);
            }

            50% {
                transform: rotate(0deg);
            }

            60% {
                transform: rotate(5deg);
            }

            70% {
                transform: rotate(0deg);
            }

            80% {
                transform: rotate(-5deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        @keyframes sonar {
            0% {
                transform: scale(0.9);
                opacity: 1;
            }

            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        .page-wrapper .sidebar-wrapper,
        .sidebar-wrapper .sidebar-brand>a,


        .sidebar-wrapper ul li a i,
        ,
        .sidebar-wrapper .sidebar-search .input-group-text,
        .sidebar-wrapper .sidebar-menu ul li a,
        #show-sidebar,
        #close-sidebar {
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        /*----------------page-wrapper----------------*/

        .page-wrapper {
            height: 100vh;
        }

        .page-wrapper .theme {
            width: 40px;
            height: 40px;
            display: inline-block;
            border-radius: 4px;
            margin: 2px;
        }

        .page-wrapper .theme.chiller-theme {
            background: #1e2229;
        }

        /*----------------toggeled sidebar----------------*/

        .page-wrapper.toggled .sidebar-wrapper {
            left: 0px;
        }

        @media screen and (min-width: 768px) {
            .page-wrapper.toggled .page-content {
                padding-left: 300px;
            }
        }

        /*----------------show sidebar button----------------*/
        #show-sidebar {
            position: fixed;
            left: 0;
            top: 10px;
            border-radius: 0 4px 4px 0px;
            width: 35px;
            transition-delay: 0.3s;
        }

        .page-wrapper.toggled #show-sidebar {
            left: -40px;
        }

        /*----------------sidebar-wrapper----------------*/

        .sidebar-wrapper {
            width: 260px;
            height: 100%;
            max-height: 100%;
            position: fixed;
            top: 0;
            left: -300px;
            z-index: 999;
        }

        .sidebar-wrapper ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-wrapper a {
            text-decoration: none;
        }

        /*----------------sidebar-content----------------*/

        .sidebar-content {
            max-height: calc(100% - 30px);
            height: calc(100% - 30px);
            overflow-y: auto;
            position: relative;
        }

        .sidebar-content.desktop {
            overflow-y: hidden;
        }

        /*--------------------sidebar-brand----------------------*/

        .sidebar-wrapper .sidebar-brand {
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }

        .sidebar-wrapper .sidebar-brand>a {
            text-transform: uppercase;
            font-weight: bold;
            flex-grow: 1;
        }

        .sidebar-wrapper .sidebar-brand #close-sidebar {
            cursor: pointer;
            font-size: 20px;
        }

        /*--------------------sidebar-header----------------------*/

        .sidebar-wrapper .sidebar-header {
            padding: 20px;
            overflow: hidden;
        }

        .sidebar-wrapper .sidebar-header .user-pic {
            float: left;
            width: 60px;
            padding: 2px;
            border-radius: 12px;
            margin-right: 15px;
            overflow: hidden;
        }

        .sidebar-wrapper .sidebar-header .user-pic img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .sidebar-wrapper .sidebar-header .user-info {
            float: left;
        }

        .sidebar-wrapper .sidebar-header .user-info>span {
            display: block;
        }

        .sidebar-wrapper .sidebar-header .user-info .user-role {
            font-size: 12px;
        }

        .sidebar-wrapper .sidebar-header .user-info .user-status {
            font-size: 11px;
            margin-top: 4px;
        }

        .sidebar-wrapper .sidebar-header .user-info .user-status i {
            font-size: 8px;
            margin-right: 4px;
            color: #5cb85c;
        }

        /*-----------------------sidebar-search------------------------*/

        .sidebar-wrapper .sidebar-search>div {
            padding: 10px 20px;
        }

        /*----------------------sidebar-menu-------------------------*/

        .sidebar-wrapper .sidebar-menu {
            padding-bottom: 10px;
        }

        .sidebar-wrapper .sidebar-menu .header-menu span {
            font-weight: bold;
            font-size: 14px;
            padding: 15px 20px 5px 20px;
            display: inline-block;
        }

        .sidebar-wrapper .sidebar-menu ul li a {
            display: inline-block;
            width: 100%;
            text-decoration: none;
            position: relative;
            padding: 8px 30px 8px 20px;
        }

        .sidebar-wrapper .sidebar-menu ul li a i {
            margin-right: 10px;
            font-size: 12px;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 4px;
        }

        .sidebar-wrapper .sidebar-menu ul li a:hover>i::before {
            display: inline-block;
            animation: swing ease-in-out 0.5s 1 alternate;
        }






        .sidebar-wrapper .sidebar-menu ul li a span.label,
        .sidebar-wrapper .sidebar-menu ul li a span.badge {
            float: right;
            margin-top: 8px;
            margin-left: 5px;
        }

        .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a:after {
            transform: rotate(90deg);
            right: 17px;
        }

        /*--------------------------side-footer------------------------------*/

        .sidebar-footer {
            position: absolute;
            width: 100%;
            bottom: 0;
            display: flex;
        }

        .sidebar-footer>a {
            flex-grow: 1;
            text-align: center;
            height: 30px;
            line-height: 30px;
            position: relative;
        }

        .sidebar-footer>a .notification {
            position: absolute;
            top: 0;
        }

        .badge-sonar {
            display: inline-block;
            background: #980303;
            border-radius: 50%;
            height: 8px;
            width: 8px;
            position: absolute;
            top: 0;
        }

        .badge-sonar:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            border: 2px solid #980303;
            opacity: 0;
            border-radius: 50%;
            width: 100%;
            height: 100%;
            animation: sonar 1.5s infinite;
        }

        /*--------------------------page-content-----------------------------*/

        .page-wrapper .page-content {
            display: inline-block;
            width: 100%;
            padding-left: 0px;
            padding-top: 20px;
        }

        .page-wrapper .page-content>div {
            padding: 20px 40px;
        }

        .page-wrapper .page-content {
            overflow-x: hidden;
        }

        /*------scroll bar---------------------*/

        ::-webkit-scrollbar {
            width: 5px;
            height: 7px;
        }

        ::-webkit-scrollbar-button {
            width: 0px;
            height: 0px;
        }

        ::-webkit-scrollbar-thumb {
            background: #525965;
            border: 0px none #ffffff;
            border-radius: 0px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #525965;
        }

        ::-webkit-scrollbar-thumb:active {
            background: #525965;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
            border: 0px none #ffffff;
            border-radius: 50px;
        }

        ::-webkit-scrollbar-track:hover {
            background: transparent;
        }

        ::-webkit-scrollbar-track:active {
            background: transparent;
        }

        ::-webkit-scrollbar-corner {
            background: transparent;
        }


        /*-----------------------------chiller-theme-------------------------------------------------*/

        .chiller-theme .sidebar-wrapper {
            background: #31353D;
        }

        .chiller-theme .sidebar-wrapper .sidebar-header,
        .chiller-theme .sidebar-wrapper .sidebar-search,
        .chiller-theme .sidebar-wrapper .sidebar-menu {
            border-top: 1px solid #3a3f48;
        }

        .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
        .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
            border-color: transparent;
            box-shadow: none;
        }

        .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role,
        .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status,
        .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
        .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text,
        .chiller-theme .sidebar-wrapper .sidebar-brand>a,
        .chiller-theme .sidebar-wrapper .sidebar-menu ul li a,
        .chiller-theme .sidebar-footer>a {
            color: #818896;
        }

        .chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover>a,
        .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a,
        .chiller-theme .sidebar-wrapper .sidebar-header .user-info,
        .chiller-theme .sidebar-wrapper .sidebar-brand>a:hover,
        .chiller-theme .sidebar-footer>a:hover i {
            color: #b8bfce;
        }

        .page-wrapper.chiller-theme.toggled #close-sidebar {
            color: #bdbdbd;
        }

        .page-wrapper.chiller-theme.toggled #close-sidebar:hover {
            color: #ffffff;
        }

        .chiller-theme .sidebar-wrapper ul li:hover a i,
        ,
        .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus+span,
        .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
            color: #16c7ff;
            text-shadow: 0px 0px 10px rgba(22, 199, 255, 0.5);
        }

        .chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
        .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
        .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
        .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
            background: #3a3f48;
        }

        .chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
            color: #6c7b88;
        }

        .chiller-theme .sidebar-footer {
            background: #3a3f48;
            box-shadow: 0px -1px 5px #282c33;
            border-top: 1px solid #464a52;
        }

        .chiller-theme .sidebar-footer>a:first-child {
            border-left: none;
        }

        .chiller-theme .sidebar-footer>a:last-child {
            border-right: none;
        }

        #sidebar {
            position: fixed;
            min-width: 210px;
            min-height: 100vh;
            border-radius: 6px;
        }

        #sidebar a {
            color: #cfd8dc
        }

        #sidebar a:hover {
            background: #29353d
        }

        #sidebar a.active {
            color: #fff;
            background: #29353d;
        }

        #module-info {
            color: #fff;
            min-height: 64px;
            padding-left: 10px;
        }

        #module-info i {
            font-size: 36px;
        }

        #module-info h1 {
            max-width: 100px;
            font-size: 18px;
            margin: 0;
        }

        #workspace {
            width: 100%;
            margin-left: 210px;
            background: #f3f6f7;
        }

        #header {
            z-index: 99;
            width: calc(100% - 210px);
            background: #F1F3FC;
            position: fixed;
            padding: 0 16px;
            height: 64px;
            color: #5f6368;
        }

        #content {
            margin-top: 64px;
            padding: 16px;
            min-height: calc(100vh - 128px);
        }

        #footer {
            color: #5f6368;
            height: 64px;
            padding-left: 16px;
            border-top: 1px solid #cfd8dc;
        }

        .btn-circle {
            border-radius: 50%;
            cursor: pointer;
            padding: 10px;
        }

        .btn-circle:hover {
            background: #ededed;
        }
    </style>
    @yield('css')
</head>

<body>
    <div class="d-flex">

        <div class="page-wrapper chiller-theme toggled">
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <a href="#">EASY CRM</a>
                        
                    </div>
                    <div class="sidebar-header">
                        <div class="user-pic">
                            <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{Auth::user()->usuario->nome}}
                               
                            </span>
                            <span class="user-role">Administrator</span>
                            <span class="user-status">
                                <i class="fa fa-circle"></i>
                                <span>Online</span>
                            </span>
                        </div>
                    </div>

                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span>Geral</span>
                            </li>
                            @foreach($menu as $item)
                            <li class="sidebar-dropdown">
                                <a href="{{$item['route']}}">
                                    <i style="width:60px; height:30px" class="material-icons">{{$item['icon']}}</i>
                                    <span> {{$item['tool']}}</span>
                                </a>
                            </li>
                            @endforeach

                            <li class="header-menu">
                                <span>Mais opções</span>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Documentação</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-calendar"></i>
                                    <span>Desenvolvedor</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-folder"></i>
                                    <span>Ajuda</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- sidebar-menu  -->
                </div>
                <!-- sidebar-content  -->
                <div class="sidebar-footer">
                    <a href="#">
                        <i class="material-icons">
                            notification_important
                        </i>
                        <span class="badge badge-pill badge-warning notification">3</span>
                    </a>
                    <a href="#">
                        <i class="material-icons">
                            mail
                        </i>
                        <span class="badge badge-pill badge-success notification">7</span>
                    </a>
                    <a href="#">
                        <i class="material-icons">
                            settings_applications
                        </i>
                        <span class="badge-sonar"></span>
                    </a>
                    <a href="#">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </nav>
            <!-- sidebar-wrapper  -->

            <!-- page-content" -->
        </div>
        <div class="d-flex flex-column" id="workspace">
            <div class="shadow-sm d-flex align-items-center justify-content-between" id="header">
                <div class="d-flex align-items-center">
                    <i class="material-icons mr-2 btn-circle" style="margin-left:30px" onclick="toggleMenu()">menu</i>


                </div>
                <div class="d-flex align-items-center">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="#">
                                    Configurações
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
            <div id="content">
                <div class="row">
                    @if (Session::has('success'))
                    <script>
                        window.onload = function() {
                            alertMsg('{{Session::get("success")}}', 'success')
                        }
                    </script>
                    @endif

                    @if (Session::has('warning'))
                    <script>
                        window.onload = function() {
                            alertMsg('{{Session::get("warning")}}', 'warning')
                        }
                    </script>
                    @endif

                    @if (Session::has('error'))
                    <script>
                        window.onload = function() {
                            alertMsg('{{Session::get("error")}}', 'error')
                        }
                    </script>
                    @endif
                </div>
                <div class="container">

                    <div class="card text-center">

                        <div class="card-header">
                            <h5 style="font-size:25px;">@yield('title')</h5>
                        </div>
                        <div class="card-body">

                            @yield('body')
                        </div>
                        @if (trim($__env->yieldContent('footer')))
                        <div class="card-footer">
                            @yield('footer')
                        </div>
                        @endif
                    </div>
                </div>

            </div>
            <div class="d-flex align-items-center" id="footer">
                Todos direitos autorais Diego Magno &copy
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{asset('js/sweetalerts.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Toggle Menu Script -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });

        function alertMsg(msg, type) {
            Toast.fire({
                type: type,
                title: msg
            })
        }

        function toggleMenu() {
            var sidebar = document.getElementById('sidebar');
            var workspace = document.getElementById('workspace');
            var header = document.getElementById('header');
            var displaySidebar = sidebar.style.display === "none" ? "block" : "none";
            var marginLeftWorkspace = workspace.style.marginLeft === "0px" ? "210px" : "0px";
            var widthHeader = header.style.width === "100%" ? "calc(100% - 210px)" : "100%";
            sidebar.style.display = displaySidebar;
            workspace.style.marginLeft = marginLeftWorkspace;
            header.style.width = widthHeader;
        }

 
    </script>
    @yield('js')
</body>

</html>