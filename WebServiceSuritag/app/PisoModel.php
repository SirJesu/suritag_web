<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PisoModel extends Model
{
    protected $table = "Piso";
    protected $primaryKey = "idPiso";
    public $timestamps = false;
}
