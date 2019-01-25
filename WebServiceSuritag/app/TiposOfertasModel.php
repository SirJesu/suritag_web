<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposOfertasModel extends Model
{
   
    protected $table = "TipoOfertas";
    protected $primaryKey = "idTipoOfertas";
    public $timestamps = false;

}
