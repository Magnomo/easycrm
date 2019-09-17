<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table = 'usuario';
    protected $fillable= ['nome','data_nascimento','nivel_id','user_id'];

    public function nivel(){
        return $this->belongsTo('App\Nivel');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
