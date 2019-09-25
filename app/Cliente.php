<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table = "cliente";
    protected $fillable = ['nome', 'dt_nascimento', 'email', 'sexo'];


    public function vendas()
    {
        return $this->hasMany('App\Venda');
    }
    public function enderecos()
    {
        return $this->hasMany('App\Endereco');
    }
    public function telefones(){
        return $this->hasMany('App\Telefone');
    }
}
