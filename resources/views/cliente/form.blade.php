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
        <div class="col-md-4">
            <label for="email">Data de Nascimento: </label>
           
            <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento">
       
        </div>

    </div>

    <hr>
    <!--Endereco-->
    <p class=" card-header text-secondary text-left font-weight-bold bg-light">Endereço:</p>

    <div class="form-row">
        <!--CEP -->
        <div class="col-md-2">
            <label for="validationTooltip01">Cep</label>
            <input type="text" class="form-control cep" id="validationTooltip01 " value="{{isset($cliente)?$cliente->enderecos->last()->cep:''}}" name="cep" required>
            
        </div>
        <!--Logradouro-->
        <div class="col-md-5">
            <label for="validationTooltip02">Logradouro</label>
            <input type="text" class="form-control rua" id="validationTooltip02" value="{{isset($cliente)?$cliente->enderecos->last()->logradouro:''}}"  name="logradouro">
        </div>

        <!--Numero-->
        <div class="col-md-2">
            <label for="validationTooltip02">Numero</label>
            <input type="text" class="form-control endereco_numero " value="{{isset($cliente)?$cliente->enderecos->last()->numero:''}}" id="validationTooltip02" name="endereco_numero">
        </div>

        <!--Complemento-->
        <div class="col-md-3 mb-3">
            <label for="validationTooltip05">Complemento</label>
            <input type="text" class="form-control complemento" value="{{isset($cliente)?$cliente->enderecos->last()->complemento:''}}" id="validationTooltip05" name="complemento">
        </div>

    </div>
    <div class="form-row">
        <!--Bairro -->
        <div class="col-md-5 mb-2">
            <label for="validationTooltipUsername">Bairro</label>
            <div class="input-group">
                <input type="text" class="form-control bairro"value="{{isset($cliente)?$cliente->enderecos->last()->bairro:''}}" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" name="bairro">
            </div>
        </div>
        <!--cidade-->
        <div class="col-md-5 mb-3">
            <label for="validationTooltip03">Cidade</label>
            <input type="text" class="form-control cidade" value="{{isset($cliente)?$cliente->enderecos->last()->cidade:''}}" id="validationTooltip03" name="cidade">
        </div>
        <!--estado-->
        <div class="col-md-2 mb-3">
            <label for="validationTooltip04">Estado</label>
            <input type="text" class="form-control estado" id="validationTooltip04" value="{{isset($cliente)?$cliente->enderecos->last()->estado:''}}" name="estado">
        </div>


    </div>

    <hr>

    <p class="   card-header text-secondary font-weight-bold text-left bg-light">Telefones:</p>
    <div action="" class="form-row">

        <div class="col-md-4">
            <label for="nome">Tipo telefone: </label>
            <select class="form-control custom-select" id="tipo_telefone" name="tipo_telefone_id">
               @foreach($data['tipo_telefones'] as $tipo)
               <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
               @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label for="email">Código do país: </label>

            <input type="text" class="form-control" required id="cod_pais" value="{{isset($cliente)&&($cliente->telefones!=null)?$cliente->telefones->last()->cod_pais:''}}" name="cod_pais">

        </div>
        <div class="col-md-2">
            <label for="email">DDD: </label>

            <input type="text" value="{{isset($cliente)&&($cliente->telefones!=null)?$cliente->telefones->last()->ddd:''}}" class="form-control" required id="ddd" name="ddd">

        </div>
        <!--Numero de telefone -->
        <div class="col-md-4">
            <label for="email">Numero: </label>
            <input type="text" value="{{isset($cliente)&&($cliente->telefones!=null)?$cliente->telefones->last()->numero:''}}" class="form-control" required id="numero" name="telefone_numero">
        </div>
        <p></p>

    </div>
    <div class="row col-12" style="justify-content: flex-start; margin-top:20px">
        <button class="btn btn-primary btn-lg" type="submit"> {{$data['button']}}</button>
    </div>
</form>


@endsection
@yield('js')
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.cep').blur(function() {
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