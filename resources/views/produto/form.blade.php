@extends('template')
@section('title','Editar produto')
@section('body')
<form method="POST" action="{{$data['url']}}" class="formulario">
    @if(isset($produto))
    @method('PUT')
    @endif
    @csrf
    <div class="form-group row">
        <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>
        <div class="col-md-6">
            <input id="nome" type="text" class="form-control nome" name="nome" value="{{ (isset($produto))?$produto->nome:old('nome') }}" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="marca" class="col-md-4 col-form-label text-md-right">Marca</label>
        <div class="col-md-6">
            <input id="marca" type="text" class="form-control marca" name="marca" value="{{ (isset($produto))?$produto->marca:old('marca') }}" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="cor" class="col-md-4 col-form-label text-md-right">Cor</label>
        <div class="col-md-6">
            <input id="cor" type="text" class="form-control cor" name="cor" value="{{ (isset($produto))?$produto->cor:old('cor') }}" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="preco" class="col-md-4 col-form-label text-md-right">Preço</label>
        <div class="col-md-6">
            <input id="preco" pattern="^\d+(,\d{1,2})?$" required type="text" class="form-control preco " name="preco" value="{{ (isset($produto))?$produto->preco:old('preco') }}" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoria</label>
        <div class="col-md-6">
        <select class='custom-select categoria' name="categoria">
            <option value="0">Selecione</option>
            @foreach($data['categorias'] as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
            @endforeach
        </select> 
        </div>
    </div>
    <div class="form-group row">
        <label for="tamanho" class="col-md-4 col-form-label text-md-right">Tamanho</label>

        <div class="col-md-6">
            @if(!isset($usuario))
            <input type="number" name="tamanho" maxlength=3 value="{{isset($produto)?$produto->preco:''}}" class="form-control">
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>
        <div class="col-md-6">
            <textarea id="descricao" class="form-control descricao " name="descricao" required>{{isset($produto)?$produto->descricao:''}}</textarea>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary enviar">
                {{(isset($produto))?'Atualizar': 'Cadastrar' }}
            </button>
        </div>
    </div>
</form>

@endsection
@yield('js')
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {


    })
    /*
        var er = /[^0-9.]/;
            er.lastIndex = 0;
            var campo = num;
            if (er.test(campo.value)) {
              campo.value = "";
            } */
</script>