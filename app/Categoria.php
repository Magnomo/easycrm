<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table= 'categoria';
    protected $fillable =['nome'];

    public function produtos(){
        return $this->hasMany('app\Produtos');
    }
}
