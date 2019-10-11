@extends('template')
@section('title', 'Visualizar venda')
@section('body')
<div class="card">
    <div class="card-header bg-info">
        <h3>Venda {{ $venda->id }} </h3>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header bg-info">
                <h5>Dados Da compra</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label> cliente:</label>
                        <input class="form-control" value="{{ isset($venda->cliente)?$venda->cliente->nome:' Desconhecido' }}" disabled>
                    </div>

                    <div class="col-md-3">
                        <label>Data da compra:</label>
                        <input type="text" name="data" value="{{ $venda->created_at }}" class="form-control data_venda" disabled>
                    </div>
                    <div class="col-md-3">
                        <label>Vencimento:</label>
                        <input type="text" name="data" value="{{ $venda->created_at }}" class="form-control data_venda" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for=""> forma de pagamento</label>
                        <input type="text" name="" value="{{$venda->formaPagamento()}}" class="form-control" disabled id="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for=""> Quantidade de Parceça</label>
                        <input type="text" name="" class="form-control" value="{{$venda->numero_parcelas}}" disabled id="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for=""> Status</label>
                        <input type="text" name="" class="form-control" value="{{$venda->status}}" disabled id="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for=""> Parcelas Restantes</label>
                        <input type="text" name="" value="{{$venda->parcelasRestantes()}}" class="form-control" disabled id="">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header text-center bg-info">
            <h5> Produtos </h5>
        </div>

        <div class="form-row adicionarProduto">
            @foreach($venda->produtos as $key => $produto)
            <div class=" col-md-6">
                <label>produto:</label>
                <input class="form-control" value="{{$produto->nome }}" disabled>
            </div>
            <div class=" col-md-3">
                <label>Quantidade:</label>
                <input type="text" name="quantidades[0]" value="{{$produto->pivot->quantidade}}" class="form-control quantidade" placeholder="Quantidade" disabled>
            </div>
            <div class="col-md-3">
                <label>Preço:</label>
                <input type="text" name="valor[0]" value="{{ $produto->preco }}" class="form-control preco" disabled>
            </div>
            @endforeach
            <div class="col-md-12">
                <label>Total:</label>
                <input type="text" name="total" value="{{ $total }}" class="form-control total" disabled>
            </div>

        </div>

        <div class="col-sm-12 " style="display:flex; justify-content-left">
            <a href="{{url('/venda')}}" class="btn btn-info" style="margin-top:10px;">Voltar</a>
        </div>


    </div>

</div>
@endsection
@yield('js')
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        dataAtualFormatada()
    })

    function dataAtualFormatada() {
        var data = $('.data_venda').val()
        var ano = data.split('-')[0];
        var mes = data.split('-')[1];
        var dia = data.split('-')[2];
        dia = dia.substr(0, 2)
        dataF = dia + '/' + mes + '/' + ano
        $('.data_venda').val(dataF)
    }
</script>