<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;
    //
    protected $table = 'usuario';
    protected $fillable= ['nome','nivel_id','user_id'];

    public function nivel(){
        return $this->belongsTo('App\Nivel');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
