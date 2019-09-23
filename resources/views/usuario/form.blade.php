@extends('template')
@section('title','Editar Usuario')
@section('body')
<form method="POST" action="{{$data['url']}}" class="formulario">
                    @if(isset($usuario))
                    @method('PUT')
                    @endif
                    @csrf
                    
                    <p class="feedback-message alert"></p>
                    <input type="hidden" class="hidden" value="{{isset($usuario)?$usuario->id:'0'}}">

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control nome" name="nome" value="{{ (isset($usuario))?$usuario->nome:old('name') }}" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control email " name="email" value="{{ (isset($usuario))?$usuario->user->email:old('email') }}" required >
                            </div>
                        </div>
                    
                      @if(!isset($usuario))
                      <div class="form-group row">
                            <label for="senha" class="col-md-4 col-form-label text-md-right">Senha</label>
                            <div class="col-md-6">
                                <input id="senha" type="password" class="form-control senha " name="senha" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cSenha" class="col-md-4 col-form-label text-md-right">Confirmar Senha</label>
                            <div class="col-md-6">
                                <input id="cSenha" type="password" class="form-control cSenha" name="cSenha" required>

                            </div>
                        </div>

                        @endif
                        <div class="form-group row">
                            <label for="tipo_nivel" class="col-md-4 col-form-label text-md-right">Nivel</label>
                            <div class="col-md-6">
                                <select name="nivel_id" id="" class="custom-select nivel">
                                <option value="">Selecione</option>
                                    @foreach($data['niveis'] as $nivel)
                                    <option value="{{$nivel->id}}" {{isset($usuario)&& ($usuario->nivel_id ==$nivel->id)?'selected':''}}>{{$nivel->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                      </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary enviar">
                                    {{(isset($usuario))?'Atualizar': __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

@endsection
@yield('js')
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.feedback-message').hide()
    var hidden = $('.hidden').val()
  $('.enviar').click(function(e){
    e.preventDefault()
    var nome = $('.nome').val().trim();
    var email = $('.email').val().trim();
    var senha = $('.senha').val().trim();
    var cSenha = $('.cSenha').val().trim();
    var nivel = $('.nivel').val().trim();
    var validaEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/
    var feedback = "";
    if(nome.length<1){
        //Nome Vazio
        feedback ='O campo <strong>nome</strong> é obrigatório vazio'
        $('.feedback-message').html(feedback)
        $('.feedback-message').addClass('alert-warning')
        $('.feedback-message').fadeIn();
        $('.nome').focus();
    }else if(nome.length<3){
        feedback = 'O campo <strong>nome</strong> deve conter no mínimo 3 caracteres'
        $('.feedback-message').html(feedback)
        $('.feedback-message').addClass('alert-warning')
        $('.feedback-message').fadeIn();
        $('.nome').focus();
      
    }else if(email<1){
        feedback = 'O campo <strong>email</strong>é obrigatório'
        $('.feedback-message').html(feedback)
        $('.feedback-message').addClass('alert-warning')
        $('.feedback-message').fadeIn();
        $('.email').focus();
        
    }else if(!validaEmail.test(email)){
        feedback = 'O  <strong>email</strong>inserido é invalido'
        $('.feedback-message').html(feedback)
        $('.feedback-message').addClass('alert-warning')
        $('.feedback-message').fadeIn();
        $('.email').focus();
        
    }else if(senha.length <8 && hidden==0){        
        feedback = 'O campo <strong>senha</strong> deve conter no mínimo 8 caracteres'
        $('.feedback-message').html(feedback)
        $('.feedback-message').addClass('alert-warning')
        $('.feedback-message').fadeIn();
        $('.senha').focus();
        
        //Senha curta
    }else if(cSenha !=senha  && hidden==0){
        feedback = 'O campo <strong>senha</strong> e <strong>confirmar senha </strong> devem ser iguais'
        $('.feedback-message').html(feedback)
        $('.feedback-message').addClass('alert-warning')
        $('.feedback-message').fadeIn();
        $('.cSenha').focus();
        //senhas diferentes
    }else{
        $('.formulario').submit()
    }
  })
  $('.email').change(function(){
      var email = $('.email').val();
      $.ajax({
          url:'/buscaEmail',
          type:"POST",
          data:{
              email: email,
              '_token': $('input[name=_token]').val(),

          },
      }).done(function(e){
          console.log('ok'+ e);
          if(e!=0){
            $('.feedback-message').html('O email cadastrado já está em uso')
            $('.feedback-message').addClass('alert-warning')
            $('.feedback-message').fadeIn();
            $('.enviar').attr('disabled','disabled')
          }else{
            $('.feedback-message').hide();
            
            $('.feedback-message').removeClass('alert-warning');
            $('.feedback-message').addClass('alert-success');
            $('.feedback-message').html('Email Disponível');
            $('.feedback-message').fadeIn();
            $('.enviar').removeAttr('disabled')

          }

      }).fail(function(){
          console.log("Fail")
      })
  })
})
</script>
