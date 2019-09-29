<?php

namespace App\Http\Controllers;

use App\{Categoria, Produto};
use Illuminate\Http\Request;
use DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flag = 1;
        $data = ['title' => 'Lista de produtos'];
        $produtos = Produto::paginate(5);
        return view('produto.index', compact('produtos', 'data', 'flag'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Cadastrar Produto',
            'url' => url('produto/'),
            'button' => "Cadastrar",
            'categorias' => Categoria::all()
        ];
        return view('produto.form', compact('data'));
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
        DB::beginTransaction();
        try {
            Produto::create([
                'nome' => $request->nome,
                'marca' => $request->marca,
                'cor' => $request->cor,
                'preco' => floatVal($request->preco),
                'categoria_id' => $request->categoria,
                'tamanho' => $request->tamanho,
                'descricao' => $request->descricao,
            ]);

            DB::commit();
            return redirect('/produto')->with('success', 'Produto Cadastrado com sucesso');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->with('warning', 'Erro inesperado ao inserir. cod:' + $ex->getMessage());
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
        $produto = Produto::findOrFail($id);
        $data = [
            'title' => 'Cadastrar Produto',
            'url' => url('produto/' . $id),
            'button' => "Atualizar",
            'categorias' => Categoria::all()
        ];
        return view('produto.form', compact('data', 'produto'));
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
        // dd($request->all());
        DB::beginTransaction();
        try {
            $produto = Produto::findOrFail($id);
            $produto->update([
                'nome' => $request->nome,
                'marca' => $request->marca,
                'cor' => $request->cor,
                'preco' => floatVal($request->preco),
                'categoria_id' => $request->categoria,
                'tamanho' => $request->tamanho,
                'descricao' => $request->descricao,
            ]);

            DB::commit();
            return redirect('/produto')->with('success', 'Produto Atualizado com sucesso');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->with('warning', 'Erro inesperado ao atualizar. cod:' + $ex->getMessage());
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
        $produto = Produto::findOrFail($id);
        $nome = $produto->nome;
        $produto->delete();
        return redirect('/produto')->with('success', 'Produto ' . $nome . ' removida com sucesso');
    }
    public function inativos()
    {
        $flag = 0;
        $data = ['title' => 'Produtos Inativos'];
        $produtosInativos = Produto::onlyTrashed()->paginate(5);
        return view('produto.index', compact('flag', 'produtosInativos', 'data'));
    }
    public function restore($id)
    {
        $produto = Produto::onlyTrashed()->findOrFail($id);
        $produto->restore();
        return back()->with('success', 'Categoria ' . $produto->nome . ' restaurada com sucesso');
    }
}
