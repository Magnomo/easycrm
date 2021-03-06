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
        $clientes = Cliente::paginate(5);
        $data = ['title' => 'Lista de Clientes'];
        return view('cliente.index', compact('clientes', 'flag', 'clientes', 'data'));
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
        //dd($request->all());


        // dd($request->all());
        DB::beginTransaction();
        try {
            //  dd($request->tipo_telefone_id);
            $cliente = Cliente::create($request->all());
            //dd($cliente);
            if ($request->cep != null) {
                $endereco = Endereco::create($request->all());
                $endereco->cliente()->associate($cliente)->save();
            }

            if ($request->tipo_telefone_id != -1) {
                $cod_pais = preg_replace('/[^a-z0-9\-]/', '', $request->cod_pais);
                $ddd = preg_replace('/[^a-z0-9\-]/', '', $request->ddd);
                $numero =  $request->telefone_numero;
                $numero = str_replace('-', '', $numero);
                $telefone = Telefone::create([
                    'ddd' => $ddd,
                    'cod_pais' => $cod_pais,
                    'telefone_numero' => $numero,
                    'tipo_telefone_id' => intval($request->tipo_telefone_id)
                ]);
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
        // dd($cliente->telefones->last()->tipo_telefone_id);
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
        DB::beginTransaction();
        try {
            //            dd($request->all());
            $cliente = Cliente::findOrFail($id);
            $cliente->update($request->all());

            if ($request->cep != null) {
                $endereco = Endereco::create($request->all());
                $endereco->cliente()->associate($cliente)->save();
            }
            if ($request->tipo_telefone_id != -1) {
                $cod_pais = preg_replace('/[^a-z0-9\-]/', '', $request->cod_pais);
                $ddd = preg_replace('/[^a-z0-9\-]/', '', $request->ddd);
                $numero =  $request->telefone_numero;
                $numero = str_replace('-', '', $numero);
                $telefone = Telefone::create([
                    'ddd' => $ddd,
                    'cod_pais' => $cod_pais,
                    'telefone_numero' => $numero,
                    'tipo_telefone_id' => intval($request->tipo_telefone_id)
                ]);
                $telefone->cliente()->associate($cliente)->save();
            }
            DB::commit();
            return redirect('/cliente')->with('success', 'Cliente ' . $cliente->nome . " atualizado com sucesso");
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('warning', 'Erro inesperado ao tentar inserir. contate o administrador do sistema. cod erro:' + $e->getMessage());
        }
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
        $cliente = Cliente::findOrFail($id);
        $nome = $cliente->nome;
        $cliente->delete();
        return redirect('/cliente')->with('success', 'Cliente' . $nome . " Excluido com sucesso");
    }
    public function inativos()
    {
        $flag = 0;
        $clientesInativos = Cliente::onlyTrashed()->paginate(5);
        $data = ['title' => 'Cliente Inativos'];
        return view('cliente.index', compact('flag', 'clientesInativos', 'data'));
    }
    public function restore($id)
    {
        $cliente = Cliente::onlyTrashed()->findOrFail($id);
        $cliente->restore();
        return back()->with('success', 'Cliente ' . $cliente->nome . " restaurado");
    }
}
