<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InformacionFinancieraModel;

class InformacionFinancieraController extends Controller
{





function AgregarEstadoFinanciero(Request $request){

$model = new InformacionFinancieraModel();

$model->targetID = $request->input("targetIdApi");
$model->idClient = $request->input("clienteIdApi");
$model->Usuarios_idUsuario = $request->input("idUsuario");

$model->save();


return json_encode( ["Status"=>true,"Msg"=>"Exitoso","obj"=>null]   ) ;



}

function ConsultarPorUsuario(Request $request){

$model = new InformacionFinancieraModel();

$query = [
["Usuarios_idUsuario","=",$request->input("idUsuario")]

];

 $value =  $model->where($query)->get()->first();

 return json_encode( ["Status"=>true,"Msg"=>"Exitoso","obj"=>$value]   ) ;

}


function ActualizarDatos(Request $request){

    $model = new InformacionFinancieraModel();
    $query = [
        ["Usuarios_idUsuario",$request->input("idUsuario")]
        
        ];
 $res = $model->where($query)->get()->first();

  $model = new InformacionFinancieraModel();

  $response = $model->find( $res->idInformacionFinaciera );

  
    $response->targetID = $request->input("targetIdApi");
    $response->idClient = $request->input("clienteIdApi");
    $response->Usuarios_idUsuario = $request->input("idUsuario");
    
    $response->save();  
    
    
    return json_encode( ["Status"=>true,"Msg"=>"Exitoso","obj"=>$response]   ) ;
    
    
    
    }




}
