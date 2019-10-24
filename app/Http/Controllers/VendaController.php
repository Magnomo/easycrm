<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\{Venda, Produto, Pagamento};
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flag = 1;
        $data =
            ['title' => 'Vendas'];
        $vendas = Venda::paginate(5);
        //
        return view('venda.index', compact('data', 'vendas', 'flag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Cadastrar Nova Venda',
            'url' => url('/venda'),
            'produtos' => Produto::all(),
            'clientes' => Cliente::all(),
            'button' => 'Cadastrar',
        ];
        return view('venda.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $venda = new Venda;
            $user = Auth::user();
            $pagamento = new Pagamento;
            $venda->forma_pagamento = $request->forma_pagamento;
            $total = 0;
            $venda->usuario()->associate($user->usuario)->save();
            if (isset($request->cliente)) {
                $cliente = Cliente::findOrFail($request->cliente);
                $venda->cliente()->associate($cliente)->save();
            }
            foreach ($request['produtos'] as $key => $produto)
                $venda->produtos()->attach($produto, array('quantidade' => $request['quantidades'][$key]));
            foreach ($venda->produtos as $key => $produto)
                $total += $venda->produtos->get($key)->preco * $request['quantidades'][$key];
            $venda->total = $total;
            if ($request->forma_pagamento != 0) {
                $venda->numero_parcelas = $request->parcelas;
                $data =  Date('Y-m-d');
                //Selecionou Pagamento
                if ($request->forma_pagamento == 2) {
                    $venda->numero_parcelas = 1;

                    //Selecionou pagamento do tipo Débito
                    $pagamento->valor = $total;
                    $pagamento->venda()->associate($venda)->save();
                    $venda->status = "finalizado";
                    $pagamento->data_pagamento = $data;
                    $pagamento->save();
                } else {
                    //Selecionou pagamento tipo crédito, dinheiro ou outro
                    if ($request->forma_pagamento == 3) {
                        //Venda no dinheiro
                        $venda->status = "Finalizado";
                        $pagamento->data_pagamento = date('Y-m-d');
                        $pagamento->valor = $total;
                        $pagamento->venda()->associate($venda)->save();
                    } else {
                        if ($request->parcelas > 1)
                            $pagamento->status = "Em Aberto";
                        $pagamento->valor = $total / $request->parcelas;
                        $pagamento->data_vencimento = $request->vencimento_parcela;
                        $pagamento->venda()->associate($venda)->save();
                        //Selecionou Crédito ou outro
                        for ($i = 1; $i < $request->parcelas; $i++) {
                            $data =  mktime(0, 0, 0, date("m") + $i, date("d"),  date("Y"));
                            $data = date('Y-m-d', $data);
                            $pag = new Pagamento;
                            $pag->data_vencimento = $data;
                            $pag->valor = $pagamento->valor;
                            $pag->venda()->associate($venda)->save();
                        }
                    }
                }
            } else {
                //não selecionou tipo de pagamento
                return back()->with('warning', 'é necessário selecionar um tipo pagamento');
            }
            // dd(date('Y-m-d',strtotime('+1 month')));
            $venda->save();
            DB::commit();
            return redirect('/venda')->with('success', 'Venda Cadastrada com sucesso');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->with('error', 'Erro ao registrar venda. cod:' + $ex->getMessage());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function visualizar($id)
    {
        $venda = Venda::findOrFail($id);
        $total = 0;

        foreach ($venda->produtos as $produto)
            $total += $produto->preco * $produto->pivot->quantidade;

        return view('venda.show', compact('venda', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function restore($id)
    {
        $venda = Venda::onlyTrashed()->findOrFail($id);
        $venda->restore();
        return back()->with('success', 'Venda' . $venda->id . " restaurada com som sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venda = Venda::findOrFail($id);
        $venda->delete();
        return back()->with('success', 'Venda Inativada');
    }
    public function inativos()
    {
        $flag = 0;
        $vendasInativas = Venda::onlyTrashed()->get();
        $data =
            ['title' => 'Vendas Inativas'];

        return view('venda.index', compact('flag', 'vendasInativas', 'data'));
    }
}
