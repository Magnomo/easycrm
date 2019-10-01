<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    //
    protected $table = 'pagamento';
    protected $fillable = ['venda_id','valor','data_pagamento','data_vencimento'];

    public function venda(){
        return $this->belongsTo('App\Venda');
    }
}
