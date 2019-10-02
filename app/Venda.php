<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    //
    protected $table = "venda";
    protected $fillable = ['data_venda', 'total', 'numero_parcelas','forma_pagamento' ,'status', 'cliente_id', 'usuario_id'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function produtos()
    {
        return $this->belongsToMany('App\Produto', 'item_venda', 'produto_id', 'venda_id')->withPivot('quantidade');
    }
    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
    public function formaPagamento()
    {
        return $this->belongsTo('App\TipoPagamento');
    }
    public function pagamentos()
    {
        return $this->hasMany('App\Pagamento');
    }
    public function parcelasRestantes(){
        return $this->pagamentos()->where('data_pagamento',null)->count();
    }
}
