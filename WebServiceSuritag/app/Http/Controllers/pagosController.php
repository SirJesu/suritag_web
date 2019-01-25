<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagosModel;

class pagosController extends Controller
{
 


function MakePago(Request $request){

 $model = new PagosModel();

 $model->Cantidad  = $request->input("cantidad");
$model->IdTransaccion  = $request->input("IdTransaccion");
 $model->Reserva_idReserva = $request->input("ReservaId");
 $model->Usuarios_idUsuario = $request->input("idUsuario");

 $model->save();

 return json_encode(["Msg"=>"Efectuado Correctamente","Status"=>true]);


}


function ConsultarPagosPorReserva(Request $request){
    $model = new PagosModel(); 
     
    $query = [
        ["Reserva_idReserva","=",$request->input("idReserva")]
    ];
    
   $model = $model->where( $query  )->get()->first();

return json_encode(["Msg"=>"Consulta","value"=>$model,"Status"=>true]);

}







}
