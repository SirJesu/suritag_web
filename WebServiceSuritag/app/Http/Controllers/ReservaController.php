<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservaModel;
use Illuminate\Support\Facades\DB;


class ReservaController extends Controller
{
  

function HacerReserva(Request $request){
$model = new ReservaModel();


$model->FechaReserva = $request->input("fechaReserva");
$model->HoraReserva = $request->input("horaReserva");
$model->CantidadPersonas = $request->input("cantidadPersonas");
$model->Usuarios_idUsuario = $request->input("idUsuario");
$model->Mesas_idMesas = $request->input("idMesa");
$model->Ofertas_idOfertas = $request->input("idOferta");
$model->Sitos_idSitos = $request->input("idSitios");

$model->save();



return json_encode(["Msg"=>"Agregado Correctamente","Status"=>true,"value"=>$model]);



}

function getByUserName(Request $request){
   // $model = new ReservaModel();

  $result =  DB::table("reserva")
    ->join("usuarios","reserva.Usuarios_idUsuario","=","usuarios.idUsuario")
    ->where("usuarios.NombreUsuario","like","".$request->input("NombreUsuario")."%")
     ->select("usuarios.NombreUsuario","reserva.*")->get()
    ;

    return json_encode(["Msg"=>"resultados","Status"=>true,"count"=>count($result),"value"=>$result  ]);
    
    





}
function ReservasPorSitio(Request $request){
      $model = new ReservaModel();

    $query = [
 ["Reserva.Sitos_idSitos","=",$request->input("idSitio")],
 ["FechaReserva",">=","".$request->input("Current").""]
 ];
    
$model =  DB::table("Reserva")
->join("Usuarios","Reserva.Usuarios_idUsuario","=","Usuarios.idUsuario")
->join("Mesas","Reserva.Mesas_idMesas","=","Mesas.idMesas")
->where($query)
->select("Reserva.*","Usuarios.NombreUsuario","Mesas.*")->get()
;    
    
    

// $model =  $model->where($query)->get();

 return json_encode(["Msg"=>"Obtenido","Status"=>true,"value"=>$model]);






}

function HistorialReservasSitios(Request $request){

$result =   DB::table("reserva")
->join("usuarios","reserva.Usuarios_idUsuario","=","usuarios.idUsuario")
->where("reserva.Sitos_idSitos",$request->input("idSitio"))
->select("reserva.*","usuarios.NombreUsuario")->get()
;    

return json_encode(["Msg"=>"Lista","Status"=>true,"value"=>$result]);

}

function HistorialReservaUsuarios(Request $request  ){
   
 $model = DB::table("Reserva")
          ->join("Sitios","Reserva.Sitos_idSitos","=","Sitios.idSitos")
           ->join("Mesas","Reserva.Mesas_idMesas","=","Mesas.idMesas")
        ->where([
            ["Reserva.Usuarios_idUsuario","=",$request->input("idUsuario")],
            ["Reserva.Estado","=","RESERVADO"]
        ])->orderBy("Reserva.FechaCreacion","desc")
         ->select("Reserva.*","Sitios.NombreSitio","Mesas.NombreMesa")
         ->get();
         
 
return json_encode(["Msg"=>"Lista","Status"=>true,"count"=>count($model),"value"=>$model]);


}

function CambiarEstadoReserva(Request $request) {
    $model = new ReservaModel();
    //RESERVADO,CANCELADO,CONFIRMADO,USADO
 $model =  $model ->find( $request->input("idReserva"));
    $model ->Estado = $request->input("estadoReserva");
     
     $model->save();
     
     return json_encode(["msg"=>"Cambiado","status"=>true]);
    
    
    
    
}








}
