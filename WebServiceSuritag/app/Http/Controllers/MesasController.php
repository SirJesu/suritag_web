<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MesasModel;
use App\ReservaModel;
use Illuminate\Support\Facades\DB;

class MesasController extends Controller
{
  

    function GetMesasBySitios(Request $request){

    
    $query = [
  ["Sitos_idSitos","=",$request->input("idSitio")]

    ];
    $result =  DB::table("Mesas")
->join("Piso","Mesas.Piso_idPiso","=","Piso.idPiso")
->where($query)
->select("Mesas.*","Piso.Nombre")->get();

    

    

   return json_encode(["value"=>$result,"count"=>count($result)]);
   


    }


function MesasByPlantel(Request $request){
 $model = new MesasModel();
 
 $model =  $model->where("Piso_idPiso",$request->input("idPiso"))->get();
 
 
   return json_encode(["value"=>$model,"count"=>count($model)]);

}


function RegistrarMesa(Request $request){

$model = new MesasModel();

$model->NombreMesa  = $request->input("NombreMesa");
$model->ValorPorPersonaMesa = $request->input("ValorPersona");
$model->EstadoMesa = $request->input("EstadoMesa");
$model->PorcentajeAdelantoMesa = $request->input("PorcentajeAdelanto");
$model->Sitos_idSitos = $request->input("idSitio");
$model->Piso_idPiso = $request->input("idPiso");
$model->MaxPersonas =$request->input("maxPersonas");

 $res =  $model->save();

return json_encode(  ["Status"=>true,"Msg"=>"Registrado Correctamente","obj"=>$res]   );

}

function UpdateEstadoMesa( Request $request ){

$model = new MesasModel();

$model =  $model->find(  $request->input("MesaId") );

$model->EstadoMesa = $request->input("EstadoMesa");

$res = $model->save();

return json_encode(  ["Status"=>true,"Msg"=>"Actualizada Correctamete","obj"=>$res]   );


}


function MesasDisponibles(Request $request){
$queryMesas = [
["Mesas.EstadoMesa","=",1],
["Piso.Estado","=",1],
["Mesas.Sitos_idSitos","=", $request->input("idSitio")],
["Mesas.MaxPersonas",">=",$request->input("Npersonas")]
];


 $mesas =  DB::table('Mesas')
 ->join("Piso","Mesas.idMesas","=","Piso.idPiso")
 ->where( $queryMesas )
  ->select("Piso.Nombre","Mesas.*")
 ->get();

$availables = [] ;
$fecha  =  new \DateTime($request->get("fecha"));
$hora = $request->get("hora");


 foreach ($mesas as $value) {

$model = new ReservaModel();

$queryM = [
["HoraReserva","STR_TO_DATE('".$hora."', '%h:%i %p')"],
["FechaReserva",$fecha],
["Reserva.Mesas_idMesas", $value->idMesas]

];

  $reserva = $model->where( $queryM )->get();

  if( $reserva == null || count($reserva) == 0  ){

$availables[]  =$value;
  }else{


  }



   
 }

return json_encode(["lista"=>$availables,"count"=>count( $availables )] );


}



    
}
