<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaModel extends Model
{
   
    protected $table = "Reserva";
    protected $primaryKey = "idReserva";
    public $timestamps = false;


}
