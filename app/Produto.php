<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    //
    use SoftDeletes;
    protected $table = "produto";
    protected $fillable = ['nome', 'preco', 'descricao', 'tamanho', 'marca', 'cor', 'categoria_id'];

    public function vendas()
    {
        return $this->belongsToMany('App\Venda', 'item_venda', 'venda_id', 'produto_id')->withPivot('quantidade');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Categoria')->withTrashed();
    }
}
