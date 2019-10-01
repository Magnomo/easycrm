<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    //
    protected $table = 'tipo_pagamento';
    protected $fillable = ['nome'];

    public function vendas()
    {
        return $this->hasMany('App\Venda');
    }
}
