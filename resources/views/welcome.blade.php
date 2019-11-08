<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-expand-lg navbar-info bg-light shadow p-3 mb-3 border rounded">
    <a class="navbar-brand" href="{{url('/')}}"> <img class="logo" src="{{asset('imgs/logo.png')}}" height="60"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar1">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/register')}}">Cadsatro <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item"><a class="nav-link" href=" {{url('/login')}}"> Login </a></li>

            </li>

        </ul>
    </div>
</nav>

<div class="jumbotron jumbotron-fluid bg-info">
    <div class="container text-center text-white">
        <h1 class="display-4">Easy CRM</h1>
        <p class="lead">Uma forma simples de Gerenciar seu negócio e ter o controle de suas vendas, clientes e funcionário</p>
    </div>
</div>




<div class="container-fluid">
    <div class="paralax d-flex justify-content-center">

    </div>
</div>

<!-- .//container -->

<article class="bg-info" >
    <div class="card-body text-center">

        <p class="   text-white">Desenvolvido por Diego Magno - IFSP - Caraguatatuba </p> <br>

    </div>
</article>
<style>
    .paralax {
        background-image: url('../imgs/paralax1.jpg');
        min-height: 500px;
        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>