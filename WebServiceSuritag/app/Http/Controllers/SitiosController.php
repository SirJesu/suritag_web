<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SitiosModel;
use PHPUnit\Framework\MockObject\Stub\Exception;
use Illuminate\Support\Facades\DB;

class SitiosController extends Controller
{
 



function GetSitioByUser(Request $request){
    $model = new SitiosModel();
    $usuario = $request->input("idUsuario");

    $query = [
 ["Usuarios_idUsuario","=",$usuario]
    ];

  $result =   $model->where($query)->get();

  return json_encode($result);



}


function GetSitiosById(Request $request){
    $model = new SitiosModel();

  $model =  $model->find( $request->input("idSitio") );

   return json_encode($model);



}


function GetSitioByIdentificador(Request $reques){
    $model = new SitiosModel();
//dd($reques->input("identificador"));
     $query = [
 ["IdentificadorSitio","=",$reques->input("identificador")]

     ];

      $result = $model->where($query)->get()->first();

 return json_encode($result);

}


function GetAllSitios(){
   
$model =   DB::table("sitios")
->join("usuarios","sitios.Usuarios_idUsuario","=","usuarios.idUsuario")
->join("categorias","sitios.Categorias_idCategorias","=","categorias.idCategorias")
->select("sitios.*","usuarios.NombreUsuario","categorias.NombreCategoria")->get();
  
    

    return json_encode(  ["Status"=>true,"Msg"=>"Sitos","obj"=>$model]  );
}



function RegistrarSitio (Request $request){

    $model = new SitiosModel();

    $model->IdentificadorSitio = $request->input("Identificador");
    $model->latitudSitio = $request->input("Latitud");
    $model->logitudSitio = $request->input("Longitud");
    $model->direccionSitio = $request->input("direccionSitio");
    $model->ImagenPrimariaSitio = $request->input("imagenPrimaria");
   $model->ImagenSecundariaSitio= $request->input("imagenSecundaria");
   $model->Usuarios_idUsuario = $request->input("idUsuario");
   $model->Categorias_idCategorias = $request->input("idCategoria");
   $model->NombreSitio = $request->input("NombreSitio");
   $model->Proveedores_idProveedores   = 1;
   $model->Telefono = $request->input("TelefonoSitio");


   try{
    $model->save();

    return json_encode(  ["Status"=>true,"Msg"=>"Registrado Correctamente","obj"=>null]  );
   }catch(Exception $e){
    return json_encode( ["Status"=>false,"Msg"=>"Error al Registrar el Sitio","obj"=>null] );
   }




}
    








}
