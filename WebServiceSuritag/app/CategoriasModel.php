<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriasModel extends Model
{
    protected $table = "Categorias";
    protected $primaryKey = "idCategorias";
    public $timestamps = false;
}
