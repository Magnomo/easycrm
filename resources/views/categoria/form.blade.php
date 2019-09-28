@extends('template')
@section('title',$data['title'])
@section('body')
<form method="POST" action="{{$data['url']}}" class="formulario">
    @if(isset($categoria))
    @method('PUT')
    @endif
    @csrf
    <input type="hidden" class="categoria-id" name="categoriaId" id="categoria-id" value="{{isset($categoria)?$categoria->id:0}}">
    <div class="form-group row">
        <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

        <div class="col-md-6">
            <input id="nome" type="text" class="form-control nome" name="nome" value="{{ (isset($categoria))?$categoria->nome:old('nome') }}" required>
            <img src="https://flevix.com/wp-content/uploads/2019/07/Ring-Preloader.gif" alt="" class="img-loader" height="80px">
            <p class=" alert mensagem-nome" id="mensagem-nome">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary enviar">
                {{$data['button']}}
            </button>
        </div>
    </div>
</form>

@endsection
@yield('js')
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.img-loader').hide();
        var typingTimer; //timer identifier
        var doneTypingInterval = 600;
        $(".nome").keyup(function(e) {
            $('#mensagem-nome').fadeOut();
            var string = $('#nome').val();
            var validator = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/
            if (!validator.test(string)) {
                $('.nome').val(string.substring(string.length - 1, 0));
                $('.nome').focus()
            }
            clearTimeout(typingTimer);
            if ($('#myInput').val) {
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            }
            var categoria = $('.categoria-id').val();
        })
    })

    function doneTyping() {
        var valor = $('.nome').val().trim();
        $('.nome').css('opacity', '0.8');
        $('.enviar').attr('disabled', true);
        buscaNome()
    }

    function buscaNome() {
        var string = $('.nome').val().trim();
        if (string.length > 0) {
            $('.img-loader').fadeIn();
            var categoria = $('.categoria-id').val()
            console.log("dados: nome:" + string + '/n id =' + categoria);
            $.ajax({
                url: '/verificaNomeCategoria',
                type: 'post',
                data: {
                    'nome': string,
                    'id': categoria,
                    '_token': $('input[name=_token]').val(),
                },
                dataType: 'json'
            }).done(function(data) {
                console.log('ok')
                $('#nome').css('opacity', '1');
                console.log(data);
                var mensagem;
                if (data != 0) {
                    mensagem = "Esta categoria já está cadastrada"
                    $('.img-loader').hide()
                    $('.mensagem-nome').removeClass('alert-success')
                    $('.mensagem-nome').addClass('alert-warning')
                } else {
                    $('.img-loader').hide()
                    $('.mensagem-nome').removeClass('alert-warning')
                    $('.mensagem-nome').addClass('alert-success')
                    mensagem = "Categoria disponível"
                    //  alert('nome livre')
                    $('.enviar').attr('disabled', false);
                }
                $('.mensagem-nome').html(mensagem)
                $('.mensagem-nome').fadeIn("slow ")
            }).fail(function(e) {
                console.log('fail')
            }).always(function() {
                console.log('always')
            })
        }
    }
</script>