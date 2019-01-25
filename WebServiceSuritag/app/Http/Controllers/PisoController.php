<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PisoModel;
use Illuminate\Support\Facades\DB;


class PisoController extends Controller
{
   


    function CrearPiso(Request $request){
 $model = new PisoModel();
 $model->Nombre = $request->get("nombrePiso");
 $model->idSitio = $request->get("idSitio");
  $model = $model->save();

 return json_encode(["Msg"=>"Registrado Correctamente","Status"=>true,"value"=>$model]);


    }

    function EditarPiso(Request $request){
        $model = new PisoModel();
     $model =   $model->find( $request->get("idPiso") );
    $model->Nombre = $request->get("nombrePiso");
    $model->Estado = $request->get("EstadoPiso");
    $model =  $model->save();

     return json_encode(["Msg"=>"Editado Correctamente","Status"=>true,"value"=>$model]);

    }


    function DesabilitarPiso(Request $request){
        $model = new PisoModel();
        $model =   $model->find( $request->get("idPiso") );
        $model->Estado = 0;
     $model = $model->save();

        return json_encode(["Msg"=>"Desabilitado","Status"=>true,"value"=>$model]);

    }

function ConsultarPisos(Request $request){

    $model = new PisoModel();
    $query = [
        ["Estado","=", 1 ],
        ["idSitio","=", $request->input("idSitio")  ]
    ];
  $model =  $model->where( $query )->get();

  return json_encode(["Msg"=>"Lista","Status"=>true,"value"=>$model]);


}




}
