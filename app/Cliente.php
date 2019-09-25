<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    //
    use SoftDeletes;
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
