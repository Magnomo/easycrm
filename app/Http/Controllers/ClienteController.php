<?php

namespace App\Http\Controllers;

use App\Cliente;

use App\Endereco;
use App\Telefone;
use DB;
use Illuminate\Http\Request;
use TipoTelefone;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $flag = 1;
        $clientes = Cliente::paginate(10);
        return view('cliente.index', compact('clientes', 'flag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'url' => '/cliente',
            'title' => 'Cadastrar Cliente',
            'button' => 'Cadastrar',
            'tipo_telefones' => DB::table('tipo_telefone')->get()
        ];
        return view('cliente.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        //   dd($request->all());
        DB::beginTransaction();
        try {
            //  dd($request->tipo_telefone_id);
            $cliente = Cliente::create($request->all());
            //dd($cliente);
            if ($request->cep != null) {
                $endereco = Endereco::create($request->all());
                $endereco->cliente()->associate($cliente)->save();
                //  dd($endereco);
            }

            if ($request->tipo_telefone_id != -1) {
                //    return 1;
                $telefone = Telefone::create($request->all());
                $telefone->cliente()->associate($cliente)->save();
            }
            DB::commit();
            return redirect('/cliente')->with('success', 'Cliente Cadastrado com sucesso');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('danger', 'Erro inesperado ao tentar inserir. cod:' + $e->getMessage());
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
        $cliente = Cliente::findOrFail($id);
        //  dd($cliente->telefones);
        $data = [
            'url' => url('cliente/' . $id),
            'title' => 'Editar Cliente',
            'button' => 'Atualizar',
            'tipo_telefones' => DB::table('tipo_telefone')->get()
        ];
        return view('cliente.form', compact('data', 'cliente'));
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
