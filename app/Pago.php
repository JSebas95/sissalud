<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $primaryKey = "id_pago";

  protected $table="pago";

  protected $fillable=['cc','nombre','apellido','valor'];

  public $timestamps = false;
}
