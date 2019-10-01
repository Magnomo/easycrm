@extends('template')
@section('title',$data['title'])
@section('body')
<form method="POST" action="{{ $data['url'] }}">
    @if(isset($data['venda']))
    @method('PUT')
    @endif
    @csrf
    <div class="form-group col-md-12">
        <label>Escolha o cliente:</label>
        <select class="form-control" name="cliente">
            <option>Selecione uma opção</option>
            @foreach($data['clientes'] as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label>Forma de Pagamento:</label>
            <select class="form-control tipo_pagamento" name="forma_pagamento">
                <option value='0'>Selecione uma opção</option>
                <option value="1">Crédito</option>
                <option value="2">Débito</option>
                <option value="3">Dinheiro</option>
                <option value="4">Outro</option>
            </select>
        </div>

        <div class="col-md-2 form-group parcelas">
            <label for="parcelas">Nª Parcelas</label>
            <input type="number" class="form-control" name="parcelas" placeholder="Ex: 3">
        </div>
        <div class="vencimento_parcela form-group col-md-4">
            <label for=".vencimento_parcela">Vencimento</label>
            <input type="date" class="form-control" name="vencimento_parcela">
        </div>


    </div>
    <div class='adicionarProduto'>
        <div class="card-header text-center">Adicionar Produtos</div>
        <div class="form-row adicionarProduto">
            <div class=" col-md-4">
                <label>Escolha os produtos:</label>
                <select class="custom-select produto" name="produtos[0]">
                    <option>Selecione</option>
                    @foreach($data['produtos'] as $produto)
                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class=" col-md-3">
                <label>Quantidade:</label>
                <input type="text" name="quantidades[0]" required class="form-control quantidade" placeholder="Quantidade">
            </div>
            <div class="col-md-3">
                <label>Preço:</label>
                <input type="text" name="valor[0]" class="form-control preco">
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger removerProduto" style=" display:flex; justify-content:left;  margin-top:30px">Remover</button>
            </div>
        </div>

        <div id="inserir"></div>

        <div class="col-sm-12">

            <button type="button" class="btn btn-success add" style="float:right ;margin:10px 60px 0 0">Adicionar</button>
        </div>
        <div class="col-sm-12 " style="display:flex; justify-content-left">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </div>
</form>
@endsection
@yield('js')
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.parcelas').hide();
        $('.vencimento_parcela').hide();
        $('.removerProduto').click(function(e) {
            e.preventDefault();
            var ultimo = document.querySelectorAll(".adicionarProduto")
            ultimo = ultimo[ultimo.length - 1]
            console.log(ultimo)
            $(ultimo).remove();
        })
        $('.produto').change(function() {
            var id = $(this).val()
            buscaPreco($(this), id)
        })
        $('.tipo_pagamento').change(function() {

            if ($(this).val() != 2 && $(this).val() != 0) {
                $(this).parent().removeClass('col-md-12')
                $(this).parent().addClass('col-md-6')
                $('.parcelas').show('slow')
                $('.vencimento_parcela').show('slow')
            } else {
                $(this).parent().removeClass('col-md-6')
                $(this).parent().addClass('col-md-12')

                $('.parcelas').hide()
                $('.vencimento_parcela').hide()
                $(this).focus()

            }
        })
        $('.quantidade').change(function() {
            var quantidade = $(this).val();
            if (quantidade <= 0) {
                $(this).val("")

            }
        })
        $('.add').click(function() {
            adicionarProduto()
        })
        var indice = 1

        function adicionarProduto() {
            $("#inserir").append("<div class='form-row adicionarProduto'><div class='col-md-4'><label>Escolha os produtos:</label><select class='custom-select produto' onChange='buscaPreco($(this), this.value)'   name='produtos[" + indice + "]'><option>Selecione uma opção</option>@foreach($data['produtos'] as $produto)<option value='{{$produto->id}}'>{{$produto->nome}}</option>        @endforeach</select></div><div class='col-md-3'><label>Quantidade:</label><input type='text' name='quantidades[" + indice + "]' class='form-control quantidade' onChange=validaQuantidade($(this),this.value) placeholder='Quantidade'></div><div class='col-md-3'><label>Preço:</label><input type='text' name='valor[" + indice + "]' class='form-control preco'></div><div class='col-sm-2'><a class='btn btn-danger text-white '  style='float:left; margin:30px 0 0 0' onClick='removerProduto($(this))'>Remover</a></div></div>")
            indice++
        }
    })

    function validaQuantidade(input, valor) {
        if (valor <= 0) {
            input.val("")
        }
    }

    function removerProduto(element) {
        element.parent().parent().remove()
    }

    function buscaPreco(select, id) {
        console.log('select = ' + select + ' id =' + id)
        $.ajax({
            url: '/buscaPreco',
            type: 'POST',
            data: {
                id: id,
                '_token': $('input[name=_token]').val(),
            }
        }).done(function(data) {
            console.log(data)
            var preco = $.parseJSON(data)['preco']
            console.log(preco)
            select.parent().parent().find('input.preco').val(preco)
        }).fail(function() {

        })
    }
</script>