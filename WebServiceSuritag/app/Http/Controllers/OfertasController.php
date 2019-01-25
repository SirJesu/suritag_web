<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfertasModel;
use Illuminate\Foundation\Console\Presets\React;
use \Illuminate\Support\Facades\DB;
class OfertasController extends Controller
{
   



function RegistrarOfertas(Request $request){

$model = new OfertasModel();
$model->TituloOferta = $request->input("TituloOferta");
$model->DescripcionOferta = $request->input("DescripcionOfeta");
$model->FechaValidaOferta = $request->input("FechaFinaLOferta");
$model->ImagenOferta  = $request->input("ImagenOferta");
$model->CantidadPersonaOfertas = $request->input("CantidadPersonaOfertas");
$model->Menues_idMenues  = $request->input("IdMenu");
$model->Mesas_idMesas = $request->input("idMesa");
$model->DescuentoOfertas = $request->input("PagoTotal");
$model ->PagoAdelantadoOfertas = $request->input("PagoPorReserva");
$model->Sitos_idSitos = $request->input("idSitio");
$model->Estado = 1;
$model->TipoOfertas_idTipoOfertas = $request->input("TipoOferta");

$model->save();

return json_encode( ["Status"=>true,"Msg"=>"Exitoso","obj"=>$model]   ) ;



}
function modificarOfertas(Request $request){
  $model = new OfertasModel();
  $model  = $model->find("idOferta");
  $model->DescuentoOfertas = $request->input("PagoTotal");////valor total de la oferta
  $model ->PagoAdelantadoOfertas = $request->input("PagoPorReserva"); ////Valor se pagara de adelanto por reservar
  $model->DescripcionOferta = $request->input("DescripcionOfeta");
  $model->FechaValidaOferta = $request->input("FechaFinaLOferta");

  $model->ImagenOferta  = $request->input("ImagenOferta");

  $model->save();

return json_encode( ["Status"=>true,"Msg"=>"Exitoso","obj"=>$model]   ) ;



}


function ObtenerOfertasDisponibles(Request $request){
   $model = new OfertasModel();
   
     $fecha = new \DateTime( $request->input("fechaActual") );
    $query = [
      ["FechaValidaOferta",">",$fecha]
      , 
      ["Estado","=",$request->input("EstadoOferta")]

    ];
   
    
   
  $res =  DB::table("Ofertas")
            ->join("Sitios","Ofertas.Sitos_idSitos","=","Sitios.idSitos")
            ->where($query)
            ->select("Ofertas.*","Sitios.*")->get();
            
   

   
   

 //  $res =  $model->where($query)->get();

    
    return json_encode( ["Status"=>true,"Msg"=>"Exitoso","obj"=>$res]   ) ;


}

function CambiarEstadoOferta(Request $request){
  $model = new OfertasModel();

  $model = $model->find($request->input("idOferta"));
  
 $model->Estado = $request->input("estado");
 $model->save();

 return json_encode( ["Status"=>true,"Msg"=>"Exitoso"]   ) ;




}
function OfertasBySitios(Request $request){
  $model = new OfertasModel();



  $model = $model->where("Sitos_idSitos", $request->input("idSitio") )->get();
  
  return json_encode(["Msg"=>"Lista de Ofertas","value"=>$model,"Estado"=>true]);

}










}
