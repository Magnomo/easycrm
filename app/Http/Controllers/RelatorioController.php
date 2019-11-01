<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Usuario, Produto, Categoria, Cliente};

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
            'clientes'=> Cliente::all()
            
        ];
        return view('relatorios.venda.index', compact('data'));
    }
}
