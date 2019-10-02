@extends('template')
@section('title',$data['title'])
@section('body')
@if($flag=1)
<table class="table text-center ">

    <thead class="">

        <div class="col-12 text-right mb-4">
            <a class="btn btn-success btn-sm" href="{{url('venda/create')}}">
                <i class="material-icons" style="vertical-align:middle; font-size:25px;">note_add</i>Adicionar
            </a>
            <a class="btn btn-danger btn-sm" href="{{url('venda/inativos')}}">
                <i class="material-icons" style="vertical-align:middle; font-size:25px;">delete</i>Inativos
            </a>
        </div>
        <tr>
           
            <th scope="col">Cliente</th>
            <th scope="col">Data</th>
            <th scope="col">status</th>
            <th scope="col">Numero de Parcelas</th>
            <th scope="col">Parcelas Restantes</th>
            <th>Total</th>
            <th>Visualizar</th>
            <th>Editar</th>
            <th>Remover</th>

        </tr>
    </thead>
    <tbody>
        @foreach($vendas as $venda)
        <tr>
            <td>{{isset($venda->cliente)?$venda->cliente->nome:''}}</td>
            <td>{{$venda->created_at}}</td>
            <td>{{$venda->status}}</td>
            <td>{{$venda->numero_parcelas}}</td>
            <td>{{$venda->parcelasRestantes()}}</td>
            <td class='total'>{{$venda->total}}</td>


            <td>
                <a href="{{url('/venda/'. $venda->id. '/show')}}" class="btn btn-primary btn-sm"> <i class="material-icons">remove_red_eye</i></a>
            </td>
            <td>
                <a class="btn btn-sm btn-info" href="{{url('venda/'.$venda->id .'/edit')}}">
                    <i class="material-icons">border_color</i>
                </a>
            </td>
            <td>
                <form method="POST" action="{{url('venda/'.$venda->id)}}" class="formDelete">
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
            <a class="btn btn-info btn-sm" href="{{url('venda/')}}">
                <i class="material-icons" style="vertical-align:middle; font-size:25px;">keyboard_backspace</i>Voltar
            </a>

        </div>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Cliente</th>
            <th scope="col">data</th>

        </tr>
    </thead>
    <tbody>
        @foreach($vendasInativos as $venda)
        <tr>
            <td>{{$venda->id}}</td>
            <td>{{isset($venda->cliente)?$cliente->nome:''}}</td>
            <td>{{$venda->created_at}}</td>

            <td>
                <a href="{{url('venda/'.$venda->id .'/restore')}}"><button class="btn btn-primary btn-sm"> <i class="material-icons">restore_from_trash</i></button></a>
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
<!--Modal-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Atenção! você tem certeza que deseja excluir esse venda?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger deleteConfirm">Excluir</button>
            </div>
        </div>
    </div>
</div>
@endsection