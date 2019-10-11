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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        #sidebar {
            background: #020945;
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
        <div id="sidebar">
            <div class="shadow-sm d-flex align-items-center" id="module-info">
                <i class="material-icons mr-2">{{$moduleInfo['icon']}}</i>
                <h1>{{$moduleInfo['name']}}</h1>
            </div>
            <nav class="nav flex-column">
                @foreach ($menu as $item)
                <a class="nav-link d-flex align-items-center" href="{{$item['route']}}">
                    <i class="material-icons mr-2">{{$item['icon']}}</i>
                    <span> {{$item['tool']}} </span>
                </a>
                @endforeach
            </nav>
        </div>
        <div class="d-flex flex-column" id="workspace">
            <div class="shadow-sm d-flex align-items-center justify-content-between" id="header">
                <div class="d-flex align-items-center">
                    <i class="material-icons mr-2 btn-circle" onclick="toggleMenu()">menu</i>

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
                                <a class="dropdown-item" href="#" >
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