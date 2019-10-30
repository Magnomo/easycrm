<?php
$moduleInfo = [
    'icon' => 'fas fa-store',
    'name' => 'Easycrm',
];
$menu = [
    ['icon' => 'fas fa-cart-plus', 'tool' => 'Produtos', 'route' => url('/produto')],
    ['icon' => 'fas fa-bars', 'tool' => 'Categorias', 'route' => url('/categoria')],
    ['icon' => 'fas fa-user', 'tool' => 'Usuários', 'route' => url('/usuario')],
    ['icon' => 'fas fa-users', 'tool' => 'Clientes', 'route' => url('/cliente')],
    ['icon' => 'fas fa-credit-card', 'tool' => 'Vendas   ', 'route' => url('/venda')],
    ['icon' => 'fas fa-database', 'tool' => 'Estoque', 'route' => url('/estoque')],
    ['icon' => 'fas fa-chart-pie', 'tool' => 'Relatórios', 'route' => url('/relatorio')],
    ['icon' => 'fas fa-cogs', 'tool' => 'Configurações', 'route' => url('/settings')],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0-rc.1/Chart.min.css" integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E=" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title> Easy CRM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    

    <link href="{{ asset('css/template.css') }}" rel="stylesheet">

</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper" style="../public/imgs/bgnav1.jpg">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">pro sidebar</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{Auth::user()->name}}
                        </span>
                        <span class="user-role">Administrator</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
             
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Geral</span>
                        </li>
                        @foreach($menu as $item)
                        <li class="sidebar-dropdown">
                            <a href="{{$item['route']}}">
                               <i class="{{$item['icon']}}"></i>

                                <span> {{$item['tool']}}</span>
                            </a>
                        </li>
                        @endforeach
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Documentation</span>
                                <span class="badge badge-pill badge-primary">Beta</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Sobre</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-question"></i>
                                <span>Help</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"> </i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                </form>

            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <div class="d-flex flex-column" id="workspace">

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
                <div class="container-fluid">


              
                    <main class="page-content d-flex-justify-content-center">
                    
                        @yield('body')
                       

                    </main>
                    <!-- page-content" -->
                </div>
            </div>
        </div>
    </div>
    <!-- page-wrapper -->
    <script type="text/javascript" src="{{asset('js/sweetalerts.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  

</body>
<script>
    // Shwet alerts
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
    jQuery(function($) {

        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                .parent()
                .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });

        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
        });




    });
</script>


</html>