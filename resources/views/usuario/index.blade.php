@extends('template')
@section('title','Lista de usuários')
@section('body')
<table class="table text-center ">

    <thead class="">

    <div class="col-12 text-right mb-4">
    <a class="btn btn-success btn-sm"  href="#">
    <i class="material-icons" style="vertical-align:middle; font-size:25px;">note_add</i>Adicionar
    </a>
    <a class="btn btn-danger btn-sm" href="#">
    <i class="material-icons" style="vertical-align:middle; font-size:25px;">delete</i>Inativos
    </a>
    </div>


        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>

            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>

        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->nome}}</td>
            <td>{{$usuario->user->email}}</td>
            
        
        
      

            <td>
                <a href="#"><button class="btn btn-primary btn-sm"> <i class="material-icons">list</i></button></a>
            </td>
            <td>
                <a class="btn btn-sm btn-warning" href="#">
                    <i class="material-icons">border_color</i>
                </a>
            </td>
            <td>
                <form method="POST" action="#">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">

                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
            </tr>
      @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="100%" class="text-center">
                <p class="text-cetner">
                </p>
            </td>
        </tr>

    </tfoot>
</table>
@endsection
