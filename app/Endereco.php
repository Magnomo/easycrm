<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    //
    public $timestamps = false;
    protected $table = "endereco";
    protected $fillable = ['logradouro', 'cep', 'endereco_numero', 'bairro', 'rua', 'cidade', 'estado', 'complemento', 'cliente_id'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
