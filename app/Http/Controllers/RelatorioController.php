<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Usuario, Produto, Categoria, Cliente,Venda};
use DB;

class RelatorioController extends Controller
{
    //
    public function index()
    {
        return view('relatorios.dashboard');
    }
    public function vendaIndex()
    {
   
        $data = [
            'usuarios'=> Usuario::all(),
            'produtos' => Produto::all(),
            'clientes'=> Cliente::all(),
            'vendas'=> Venda::all(),
            
        ];
        // $vendaVendedor = DB::select('select  u.nome, count(v.id) from venda as v join usuario as u  where u.id = v.usuario_id 
        //    group by v.usuario_id');
         
        return view('relatorios.venda.index', compact('data'));
    }
}
