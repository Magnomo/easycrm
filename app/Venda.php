<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    //
    use SoftDeletes;
    protected $table = "venda";
    protected $fillable = ['data_venda', 'total', 'numero_parcelas', 'forma_pagamento', 'status', 'cliente_id', 'usuario_id'];

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
        $forma = $this->forma_pagamento;
        $nome = "";
        switch ($forma) {
            case 1:
                $nome = 'Crédito';
                break;
            case 2:
                $nome = "Débito";
                break;
            case 3:
                $nome = "Dinheiro";
                break;
            case 4:
                $nome = 'Outro';
                break;
        }
        return $nome;
    }
    public function pagamentos()
    {
        return $this->hasMany('App\Pagamento');
    }
    public function parcelasRestantes()
    {
        return $this->pagamentos()->where('data_pagamento', null)->count();
    }
    public function proximoVencimento()
    {
        return $this->pagamentos()->where('data_pagamento', null)->first();
    }
}
