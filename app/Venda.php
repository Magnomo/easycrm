<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    //
    protected $table = "venda";
    protected $fillable = ['data_venda', 'total', 'parcelas_restantes', 'status', 'cliente_id', 'usuario_id'];

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

}
