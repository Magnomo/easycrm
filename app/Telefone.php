<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    //
    protected $table = 'telefone';
    protected $fillable = ['ddd', 'cod_pais', 'telefone_numero', 'cliente_id'];


    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
