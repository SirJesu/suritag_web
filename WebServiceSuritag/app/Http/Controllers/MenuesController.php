<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuesModel;
use App\responseObj;
use Illuminate\Foundation\Console\Presets\React;

class MenuesController extends Controller
{
   

function RegistrarMenu(Request $request){


  $model = new MenuesModel();
  
  $model->Nombre =$request->input("Nombre") ;
  $model->Imagen =$request->input("Imagen") ;
  $model->Descripcion =$request->input("Descripcion") ;
  $model->TipoMenu_idTipoMenu= $request->input("TipoMenu");
  $model->Precio =$request->input("Precio") ;
  $model->Sitos_idSitos =$request->input("idSitio") ;

  $model->save();



return json_encode(["Msg"=>"Guardado","Status"=>true]);
}



function GeyMenuFilterType(Request $request){

  $model = new MenuesModel();

  $filter = $request->input("filter");


  switch ( $filter ){


case "comida":

$query =[
  ["Sitos_idSitos","=",$request->input("idSitios")],
  ["TipoMenu_idTipoMenu","=","Comida"]
];
 $model = $model->where( $query )->get();

  return   json_encode(["value"=>$model,"count"=> count($model)]);


break;

case "bebida":

$query =[
  ["Sitos_idSitos","=",$request->input("idSitios")],
  ["TipoMenu_idTipoMenu","=","Bebida"]
];


$model = $model->where( $query )->get();

return   json_encode(["value"=>$model,"count"=> count($model)]);

break;

case "all":

$query =[
  ["Sitos_idSitos","=",$request->input("idSitios")]
  ];

  $model = $model->where( $query )->get();

  return   json_encode(["value"=>$model,"count"=> count($model)]);


break;



  }



}




function GetMenuBySite(Request $request){

 $model = new MenuesModel();

$query = [
[ "Sitos_idSitos","=",$request->input("idSitio") ],
[ "status","=", 1]
];

  $resultado =  $model->where($query)->get();




 return json_encode( ["Status"=>true,"Msg"=>"","value"=>$resultado] );



}

function DeleteMenu(Request $request){
    $model = new MenuesModel();

    $res = $model->find($request->input("idMenu"));
    $res->delete();

    

   
    return json_encode(["Msg"=>"eliminado correctamente","Status"=>true]);



}






}
