<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\resenasModel;
use App\responseObj;

class resenasController extends Controller
{
   



function HacerResena(Request $request){
  $model = new resenasModel();
  
  $model->comentarioResena = $request->input("comentario");
 $model->calificacion = $request->input("calificacion");
 $model->Usuarios_idUsuarios = $request->input("idUsuario");
 $model->Sitios_idSitios = $reuqest->input("idSitio");

 $model->save();

 $res = new responseObj();

 $res->text = "Realizado Correctamente";
 $res->estado = true;

 return json_encode($res);



}











}
