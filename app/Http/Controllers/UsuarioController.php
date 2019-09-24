<?php

namespace App\Http\Controllers;

use App\{Usuario,User,Nivel};
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $flag=1;
        $usuarios = Usuario::paginate(10);
        return view('usuario.index', compact('usuarios','flag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'url' => url('usuario'),
            'niveis' => Nivel::all(),
        ];
        //  dd($usuario);
        return view('usuario.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $usuario  = Usuario::create($request->all());
        // dd($request->all());
        if ($request->senha != $request->cSenha) {
            return back()->with('warning', 'As senhas devem ser iguais');
        }
        $user = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
        ]);
        Usuario::create([
            'nome' => $user->name,
            'user_id' => $user->id,
            'nivel_id' => $request->nivel_id,
        ]);
        return redirect('/usuario')->with('success', 'Usuário Criado com sucesso');

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

        $data = [
            'url' => url('usuario/' . $id),
            'niveis' => Nivel::all(),
        ];
        $usuario = Usuario::findOrFail($id);
        //  dd($usuario);
        return view('usuario.form', compact('usuario', 'data'));
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
        //   dd($request->all());
        DB::beginTransaction();
        try {
            $usuario = Usuario::findOrFail($id);
            $usuario->update($request->all());
            if ($request->nivel != null) {

                $nivel = Nivel::findOrFail($request->nivel_id);
                $usuario->nivel()->associate($nivel)->save();
            }
            DB::commit();
            return redirect('usuario')->with('success', 'Usuário Atualizado com sucesso');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('message', 'Erro ao tentar atualizar, erro:' . $e->getMessage());
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
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect('/usuario')->with('success', 'Usuário Removido com sucesso');
        //
    }
    public function inativos(){
        $flag = 0;
        $usuariosInativos = Usuario::onlyTrashed()->get();
        return view('usuario.index',compact('flag','usuariosInativos'));
       
    }
    public function restore($id){
        $usuario = Usuario::onlyTrashed()->findOrFail($id);
        $usuario->restore();
        return back()->with('success','Usuário Restaurado com sucesso');
    }
    public function buscaEmail(Request $request){
      $totalEmail = User::where('email', $request->email)->count();
      return $totalEmail;
    }
}
