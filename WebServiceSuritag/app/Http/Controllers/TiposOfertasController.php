<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TiposOfertasModel; 

class TiposOfertasController extends Controller
{
   

function GetAllTipos(Request $request){
$model = new TiposOfertasModel();

$model = $model->all();

return json_encode(["value"=>$model]);



}



}
