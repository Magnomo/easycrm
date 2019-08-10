@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class='text-center'>Lista de usuários</h1>
    <div class="table text-center ">
        <table border='1'>
            <tr>
                <td>id</td>
                <td>Nome</td>
                <td>Email</td>
            </tr>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->nome}}</td>
                <td>{{$usuario->email}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection