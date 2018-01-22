<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $primaryKey = "id_pago";

  protected $table="pago";

  protected $fillable=['valor','id_user','pension','salud','arl'];

  public $timestamps = false;

  public function cliente(){
      return $this->belongsTo('App\Cliente','id_user');      
  }

}
