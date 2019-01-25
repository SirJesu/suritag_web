<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuariosModel extends Model
{
    protected $table = "TipoUsuarios";
    protected $primaryKey = "idTipoUsuario";
    public $timestamps = false;

}
