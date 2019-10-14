@extends('template')
@section('title',' Titulo')
@section('body')
<div class="row">
    <div class="col-lg-3 col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-sm-12 col-md-5">
                        <img src="{!! asset('imgs/estoque-icon.png') !!}" alt="" height="72px" class="image image-responsive">

                    </div>
                    <div class="col-lg-7 col-md-5 col-sm-12">
                        <p class="card-text"> Text 1</p>
                        <h3 class="card-title">Text 2</h3>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <p class="text-left">Relatório de estoque</p>
            </div>
        </div>
    </div>
    <!-- -->
    <div class="col-lg-3 col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-sm-12 col-md-5">
                        <img src="{!! asset('imgs/estoque-icon.png') !!}" alt="" height="72px" class="image image-responsive">

                    </div>
                    <div class="col-lg-7 col-md-5 col-sm-12">
                        <p class="card-text"> Text 1</p>
                        <h3 class="card-title">Text 2</h3>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <p class="text-left">Relatório de vendas</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-sm-12 col-md-5">
                        <img src="{!! asset('imgs/estoque-icon.png') !!}" alt="" height="72px" class="image image-responsive">

                    </div>
                    <div class="col-lg-7 col-md-5 col-sm-12">
                        <p class="card-text"> Text 1</p>
                        <h3 class="card-title">Text 2</h3>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <p class="text-left">Relatório de clientes</p>
            </div>
        </div>
    </div>
</div>
@endsection