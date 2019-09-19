@extends('template')
@section('title','Editar Usuario')
@section('body')
<form method="POST" action="{{$data['url']}}">
                    @if(isset($usuario))
                    @method('PUT')
                    @endif
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ (isset($usuario))?$usuario->nome:old('name') }}" required autocomplete="name" autofocus>                              
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{ (isset($usuario))?$usuario->user->email:old('email') }}" required autocomplete="email">
                             
                            </div>
                        </div>
                        @if(isset($usuario))
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha atual</label>

                            <div class="col-md-6">
                                <input id="senhaAtual" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                        </div>
                        @endif

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{(isset($usuario))?'Nova Senha': __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{(isset($usuario))?'Confirmar Nova senha': __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
yield('js')
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.enviar').click(function(){
      
  })
})
</script>