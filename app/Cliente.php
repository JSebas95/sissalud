<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = "id_user";

    protected $table="cliente";

    protected $fillable=['nombre','apellido','cc','telefono'];

    public $timestamps = false;

    public function pago(){
      return $this->hasMany('App\Pago','id_user');
    }
}
