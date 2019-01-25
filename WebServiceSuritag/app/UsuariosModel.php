<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model
{

    protected $table = "Usuarios";
    protected $primaryKey = "idUsuario";
    public $timestamps = false;


}
