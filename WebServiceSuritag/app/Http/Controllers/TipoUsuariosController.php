<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoUsuariosModel;

class TipoUsuariosController extends Controller
{
   

    function getAll(){
   $model = new TipoUsuariosModel();
   $result = $model->all();

   return $result;

    }




}
