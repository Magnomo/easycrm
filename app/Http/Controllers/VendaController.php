<?php

namespace App\Http\Controllers;

use App\Cliente;

use App\Produto;
use App\Venda;use DB;
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

            $cliente = Cliente::findOrFail($request->cliente);
            $venda = new Venda;
            $venda->usuario()->associate($user->usuario);
            $venda->cliente()->associate($cliente);
            $venda->status = 'fechada';
            $total = 0;
            foreach ($request['produtos'] as $key => $produto) {
                $venda->produtos()->attach($produto, array('quantidade' => $request['quantidades'][$key]));
            }
            $venda->save();
            DB::commit();
            return redirect('/venda')->with('success','Venda Cadastrada com sucesso');
        } catch (Exception $ex) {
            DB::rollback();
            
            return back()->with('error','Erro ao registrar venda. cod:'+ $ex->getMessage());
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
