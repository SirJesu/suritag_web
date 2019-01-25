<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagosModel extends Model
{
   
    protected $table = "pago";
    protected $primaryKey = "idPago";
    public $timestamps = false;

}
