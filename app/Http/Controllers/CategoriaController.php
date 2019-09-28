<?php

namespace App\Http\Controllers;

use App\{Categoria};
use Illuminate\Http\Request;
use DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flag = 1;
        $categorias = Categoria::paginate(10);
        $data = [
            'title' => 'Lista de categorias'
        ];
        return view('categoria.index', compact('flag', 'data', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'url' => url('/categoria'),
            'title' => 'Criar Categoria',
            'button' => 'Cadastrar'
        ];
        return view('categoria.form', compact('data'));
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
            Categoria::create($request->all());
            DB::commit();
            return redirect('/categoria')->with('success', 'Categoria ' . $request->nome . ' cadastrada com sucesso');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->with('warning', 'erro ao cadastrar cod:' + $ex->getMessage());
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
        $categoria = Categoria::findOrFail($id);
        $data = [
            'url' => url('/categoria/' . $id),
            'title' => 'Editar Categoria',
            'button' => 'Atualizar'
        ];
        return view('categoria.form', compact('data', 'categoria'));
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
            $categoria = Categoria::findorFail($id);
            $categoria->update($request->all());
            DB::commit();
            return redirect('/categoria')->with('success', 'Categoria ' . $categoria->nome . ' Atualizada com sucesso');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->with('warning', 'erro ao atualizada cod:' + $ex->getMessage());
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
        $categoria = Categoria::findOrFail($id);
        $nome = $categoria->nome;
        $categoria->delete();
        return redirect('/categoria')->with('success', 'Categoria ' . $nome . ' removida com sucesso');
    }
    public function verificaNome(Request $request)
    {
        if ($request->id != 0) {
            $categorias =  DB::table('categoria')
                ->where('id', '<>', $request->id)->select('nome')->where('nome', $request->nome)->count();
        } else
            $categorias = DB::table('categoria')->select('nome')->where('nome', $request->nome)->count();
        return $categorias;
    }
    public function inativos()
    {
        $flag = 0;
        $data = ['title' => 'Categorias Inativas'];
        $categoriasInativas = Categoria::onlyTrashed()->paginate(5);
        return view('categoria.index', compact('flag', 'categoriasInativas', 'data'));
    }
    public function restore($id)
    {
        $categoria = Categoria::onlyTrashed()->findOrFail($id);
        $categoria->restore();
        return back()->with('success', 'Categoria ' . $categoria->nome . ' restaurada com sucesso');
    }
}
