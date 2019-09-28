@extends('template')
@section('title',$data['title'])
@section('body')
@if($flag==1)
<table class="table text-center ">

    <thead class="">

        <div class="col-12 text-right mb-4">
            <a class="btn btn-success btn-sm" href="{{url('categoria/create')}}">
                <i class="material-icons" style="vertical-align:middle; font-size:25px;">note_add</i>Adicionar
            </a>
            <a class="btn btn-danger btn-sm" href="{{url('categoria/inativos')}}">
                <i class="material-icons" style="vertical-align:middle; font-size:25px;">delete</i>Inativos
            </a>
        </div>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
        
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->nome}}</td>

            <td>
                <a href="#"><button class="btn btn-primary btn-sm"> <i class="material-icons">list</i></button></a>
            </td>
            <td>
                <a class="btn btn-sm btn-info" href="{{url('categoria/'.$categoria->id .'/edit')}}">
                    <i class="material-icons">border_color</i>
                </a>
            </td>
            <td>
                <form method="POST" action="{{url('categoria/'.$categoria->id)}}" class="formDelete">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger btnDeleteUser" data-toggle="modal" data-target="#modal">

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
@else
<table class="table text-center ">

    <thead class="">

        <div class="col-12 text-right mb-4">
            <a class="btn btn-info btn-sm" href="{{url('categoria/')}}">
                <i class="material-icons" style="vertical-align:middle; font-size:25px;">keyboard_backspace</i>Voltar
            </a>

        </div>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Restaurar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categoriasInativas as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->nome}}</td>
            <td>
                <a href="{{url('categoria/'.$categoria->id .'/restore')}}"><button class="btn btn-primary btn-sm"> <i class="material-icons">restore_from_trash</i></button></a>
            </td>
        </tr>
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
@endif
@endsection
@yield('js')