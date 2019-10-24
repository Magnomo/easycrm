@extends('template')
@section('title',$data['title'])
@section('body')
<form method="POST" action="{{ $data['url'] }}">

    @if(isset($cliente))
    @method('PUT')
    @endif

    @csrf
    <p class="   card-header text-secondary font-weight-bold text-left bg-light">Informações do Cliente:</p>

    <div action="" class="form-row">
        <!--Nome do Cliente -->
        <div class="col-md-4">
            <label for="nome">Nome: </label>
            <input type="text" class="form-control " id="nome" name="nome" value="{{isset($cliente)?$cliente->nome:''}}" required>

        </div>
        <!--Nome do Email -->
        <div class="col-md-4">
            <label for="email">Email: </label>
            <input type="text" class="form-control" id="email" value="{{isset($cliente)?$cliente->email:''}}" name="email">

        </div>
        <!--Data de nascimento -->
        <div class="col-md-4  ">
            <label for="dt_nascimento">Data de Nascimento: </label>

            <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento">

        </div>

    </div>

    <hr>
    <!--Endereco-->
    <p class=" card-header text-secondary text-left font-weight-bold bg-light">Endereço:</p>

    <div class="form-row">
        <!--CEP -->
        <div class="col-md-2 col-sm-4">
            <label for="cep">Cep</label>
            <input type="text" class="form-control cep" id="cep" value="{{isset($cliente)?$cliente->enderecos->last()->cep:''}}" name="cep" required>

        </div>
        <!--Logradouro-->
        <div class="col-md-5">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control rua" id="logradouro" value="{{isset($cliente)?$cliente->enderecos->last()->logradouro:''}}" name="logradouro">
        </div>

        <!--Numero-->
        <div class="col-md-2">
            <label for="endereco_numero">Numero</label>
            <input type="text" class="form-control endereco_numero " value="{{isset($cliente)?$cliente->enderecos->last()->numero:''}}" id="endereco_numero" name="endereco_numero">
        </div>

        <!--Complemento-->
        <div class="col-md-3 mb-3">
            <label for="complemento">Complemento</label>
            <input type="text" class="form-control complemento" value="{{isset($cliente)?$cliente->enderecos->last()->complemento:''}}" id="complemento" name="complemento">
        </div>

    </div>
    <div class="form-row">
        <!--Bairro -->
        <div class="col-md-5 mb-2">
            <label for="bairro">Bairro</label>
            <div class="input-group">
                <input type="text" class="form-control bairro" value="{{isset($cliente)?$cliente->enderecos->last()->bairro:''}}" id="bairro" aria-describedby="validationTooltipUsernamePrepend" name="bairro">
            </div>
        </div>
        <!--cidade-->
        <div class="col-md-5 mb-3">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control cidade" value="{{isset($cliente)?$cliente->enderecos->last()->cidade:''}}" id="cidade" name="cidade">
        </div>
        <!--estado-->
        <div class="col-md-2 mb-3">
            <label for="uf">Estado</label>
            <input type="text" class="form-control estado" id="uf" value="{{isset($cliente)?$cliente->enderecos->last()->estado:''}}" name="estado">
        </div>


    </div>

    <hr>

    <p class="   card-header text-secondary font-weight-bold text-left bg-light">Telefones:</p>
    <div action="" class="form-row">

        <div class="col-md-6 col-lg-4 col-sm-12">
            <label for="tipo_telefone">Tipo telefone: </label>
            <select class="form-control custom-select tipo_telefone" id="tipo_telefone" name="tipo_telefone_id">
                <option value="-1">Selecione</option>
                <option value="1">Comercial</option>
                <option value="2">Residencial</option>
                <option value="3">Celular</option>

            </select>
        </div>
        <div class="col-md-6 col-lg-2 col-sm-12 col_cod_pais">
            <label for="cod_pais">Cód do país: </label>

            <input type="text" class="form-control cod_pais" required id="cod_pais" value="{{isset($cliente)&&($cliente->telefones!=null)?$cliente->telefones->last()->cod_pais :'55'}}" name="cod_pais">

        </div>
        <div class="col-md-6 col-lg-2 col-sm-12 col_ddd">
            <label for="ddd">DDD: </label>

            <input type="text" value="{{isset($cliente)&&($cliente->telefones!=null)?$cliente->telefones->last()->ddd  . '' :''}}" class="form-control ddd" required id="ddd" name="ddd">

        </div>
        <!--Numero de telefone -->
        <div class="col-md-6 col-lg-4 col-sm-12 col_telefone_numero">
            <label for="numero">Numero: </label>
            <input type="text" maxlength="10" value="{{isset($cliente)&&($cliente->telefones!=null)?$cliente->telefones->last()->telefone_numero:''}}" class="form-control telefone_numero" required id="numero" name="telefone_numero">
        </div>
        <p></p>

    </div>
    <div class="row col-12" style="justify-content: flex-start; margin-top:20px">
        <button class="btn btn-primary btn-lg" type="submit"> {{$data['button']}}</button>
    </div>
</form>


@endsection
@yield('js')
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {

        //Mascaras
        if ($('.tipo_telefone').val() == -1) {
            $('.col_ddd').hide();
            $('.col_cod_pais').hide()
            $('.col_telefone_numero').hide();
        }

        $('.tipo_telefone').change(function() {
            if ($('.tipo_telefone') != -1) {
                $('.col_ddd').show("slow");
                $('.col_cod_pais').show("slow")
                $('.col_telefone_numero').show("slow");
            } else {
                $('.col_ddd').hide();
                $('.col_cod_pais').hide()
                $('.col_telefone_numero').hide();
            }
            if ($('.tipo_telefone').val() == 3)
                $('.telefone_numero').mask('00000-0000')
            else
                $('.telefone_numero').mask('0000-0000')
        })
        $('.cep').change(function() {
            buscaCep()
        })
    })

    function buscaCep() {
        var c = $('.cep').val();
        console.log(c)
        var urlCep = 'https://viacep.com.br/ws/' + c + '/json';
        console.log(urlCep)
        var validacep = /^[0-9]{8}$/
        if (validacep.test(c)) {
            $.ajax({
                url: urlCep,
                type: 'get'
            }).done(function(e) {
                if (!("erro" in e)) {
                    $('.rua').val(e.logradouro);
                    $('.bairro').val(e.bairro);
                    $('.cidade').val(e.localidade);
                    $('.estado').val(e.uf);
                    $('.complemento').val(e.complemento);
                    $()
                } else
                    console.log("erro in dados")
            }).fail(function() {
                console.log('fail')
            })
        } else {
            alert("cep Invalido")
        }
    }
</script>