@extends('template')
@section('title','Pagina Inicial')
@section('body')
<div class="container-fluid">
    <div class="row justify-content-left">

        <div class="card col-md-6 col-lg-3 col-sm-12">


            <div class="card-body ">
                <img src="{!! asset('imgs/product-icon.png') !!}" height="80px">
                <h3 class="card-title">Produtos</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
                <a href="{{url('/produto')}}" class="btn btn-info card-link">Visualizar</a>
            </div>
        </div>
        <div class="card col-md-6 col-lg-3 col-sm-12">


            <div class="card-body ">
                <img src="{!! asset('imgs/client-icon.png') !!}" height="80px">
                <h3 class="card-title">Clientes</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
            <a href="{{url('/cliente')}}" class="btn btn-info card-link">Visualizar</a>
            </div>
        </div>
        <div class="card col-md-6 col-lg-3 col-sm-12">


            <div class="card-body ">
                <img src="{!! asset('imgs/user-icon.png') !!}" height="80px">
                <h3 class="card-title">Usuários</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
            <a href="{{url('/usuario')}}" class="btn btn-info card-link">Visualizar</a>
            </div>
        </div>
        <div class="card col-md-6 col-lg-3 col-sm-12">


            <div class="card-body ">
                <img src="{!! asset('imgs/venda-icon.jpg') !!}" height="75px">
                <h3 class="card-title">Vendas</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
            <a href="{{url('/venda')}}" class="btn btn-info card-link">Visualizar</a>
            </div>
        </div>
        <div class="card col-md-6 col-lg-3 col-sm-12">
            <div class="card-body ">
                <img src="{!! asset('imgs/chart-icon.png') !!}" height="80px">
                <h3 class="card-title">Relatórios</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
            <a href="{{url('/relatorio')}}" class="btn btn-info card-link">Visualizar</a>
            </div>
        </div>
        <div class="card col-md-6 col-lg-3 col-sm-12">
            <div class="card-body ">
                <img src="{!! asset('imgs/estoque-icon.png') !!}" height="80px">
                <h3 class="card-title">Estoque</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
            <a href="{{url('/estoque')}}" class="btn btn-info card-link">Visualizar</a>
            </div>
        </div>
        <div class="card col-md-6 col-lg-3 col-sm-12">
            <div class="card-body ">
                <img src="{!! asset('imgs/categoria-icon.png') !!}" height="80px">
                <h3 class="card-title">Categorias</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
            <a href="{{url('/categoria')}}" class="btn btn-info card-link">Visualizar</a>
            </div>
        </div>
        <div class="card col-md-6 col-lg-3 col-sm-12">
            <div class="card-body ">
                <img src="{!! asset('imgs/setting-icon.png') !!}" height="80px">
                <h3 class="card-title">Opções</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
            <a href="{{url('/opcoes')}}" class="btn btn-info card-link">Visualizar</a>
            </div>
        </div>
    </div>
</div>
@endsection
@yield('css')
