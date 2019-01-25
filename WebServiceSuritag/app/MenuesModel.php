<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuesModel extends Model
{
    protected $table = "Menues";
    protected $primaryKey = "idMenues";
    public $timestamps = false;
}
