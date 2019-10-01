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
        $vendas = Venda::paginate(10);
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
            $user = Auth::user();
            $pagamento = new Pagamento;
            $cliente = Cliente::findOrFail($request->cliente);
            $venda = new Venda;
            $venda->usuario()->associate($user->usuario);
            $venda->cliente()->associate($cliente)->save();


            $venda->status = 'fechada';
            $total = 0;

            foreach ($request['produtos'] as $key => $produto) {
                $venda->produtos()->attach($produto, array('quantidade' => $request['quantidades'][$key]));
                $total += $venda->produtos->get($key)->preco * $request['quantidades'][$key];
            }
            $venda->total = $total;
            //  dd($request->all());
            if ($request->forma_pagamento != 0) {
                //Selecionou Pagamento
                if ($request->tipo_pagamento == 2) {
                    //Selecionou pagamento do tipo Débito

                    $pagamento->valor = $total;
                    $pagamento->save();
                    $pagamento->data_pagamento = $pagamento->created_at;
                } else {
                    //Selecionou pagamento tipo crédito, dinheiro ou outro
                    $pagamento->valor = $total / $request->parcelas;
                    $pagamento->data_vencimento = $request->vencimento_parcela;
                    $pagamento->venda()->associate($venda);
                    $data =  Date('Y-m-d');
                    for ($i = 0; $i < $request->parcelas; $i++) {
                        $data =  mktime(0, 0, 0, date("m") + $i, date("d"),  date("Y"));
                        $data = date('Y-m-d', $data);
                        $pag = new Pagamento;
                        $pag->valor = $pagamento->valor;
                        $pag->data_vencimento = $data;
                        $pag->venda()->associate($venda)->save();
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
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
