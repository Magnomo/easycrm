@extends('template')
@section('title','Editar produto')
@section('body')
<div class="container">
    <div class="row h-100 " style="min-height:100vh">
        <div class="col-12  ">
            <div class="card w-100 shadow p-3 mb-5  rounded d-flex ">
                <div class="card-header shadow p-3 mb-5 bg-info  text-center w-100">
                    <h1 class="h1 text-white lead">{{$data['title']}}</h1>
                </div>
                <div class="card-body w-100 ">

                    <form method="POST" action="{{$data['url']}}" class="formulario w-100">
                        @if(isset($produto))
                        @method('PUT')
                        @endif
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nome" class="col-form-label ">Nome</label>

                                <input id="nome" type="text" class="form-control nome" name="nome" value="{{ (isset($produto))?$produto->nome:old('nome') }}" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label for="marca" class=" col-form-label ">Marca</label>

                                <input id="marca" type="text" class="form-control marca" name="marca" value="{{ (isset($produto))?$produto->marca:old('marca') }}" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label for="cor" class=" col-form-label ">Cor</label>

                                <input id="cor" type="text" class="form-control cor" name="cor" value="{{ (isset($produto))?$produto->cor:old('cor') }}" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label for="preco" class="col-form-label ">Preço</label>

                                <input id="preco" required type="text" class="form-control preco " name="preco" value="{{ (isset($produto))?$produto->preco:old('preco') }}" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label for="categoria" class=" col-form-label ">Categoria</label>

                                <select class='custom-select categoria' name="categoria">
                                    <option value="0">Selecione</option>
                                    @foreach($data['categorias'] as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-4">
                                <label for="tamanho" class=" col-form-label ">Tamanho</label>


                                @if(!isset($usuario))
                                <input type="text" name="tamanho" maxlength=3 value="{{isset($produto)?$produto->preco:''}}" required class="form-control tamanho">
                                @endif

                            </div>
                            <div class=" form-group col-md-12">
                                <label for="descricao  ">Descrição</label><br>

                                <textarea id="descricao" class="form-control descricao col-12" name="descricao" required>{{isset($produto)?$produto->descricao:''}}</textarea>


                            </div>

                            <div class="form-group col-md-12 mb-0">
                                <button type="submit" class="btn btn-primary enviar" style="margin-top:45px">
                                    {{(isset($produto))?'Atualizar': 'Cadastrar' }}
                                </button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
@yield('js')
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var nome = $('.nome').val().trim()
        var marca = $('.marca').val().trim()
        var cor = $('.cor').val().trim()
        var preco = $('.preco').val().trim()
        var categoria = $('.categoria').val().trim()
        var tamanho = $('.tamanho').val().trim()
        var descricao = $('.descricao').val().trim()

        $('.enviar').click(function(e) {

        })
    })

    /*
        var er = /[^0-9.]/;
            er.lastIndex = 0;
            var campo = num;
            if (er.test(campo.value)) {
              campo.value = "";
            } */
</script>