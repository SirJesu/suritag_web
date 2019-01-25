<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriasModel;


class CategoriasController extends Controller
{
   



    function GetAll(){

        $model = new CategoriasModel();

      $res =   $model->all();


      return json_encode(  ["Status"=>true,"Msg"=>"Lista ","obj"=>$res]  );

    }

    function RegistrarCategoria(Request $request){
      
        $model = new CategoriasModel();
        $model->NombreCategoria = $request->input("NombreCat");
        $model->IconoCategoria = $request->input("IconoCat");
        $model->save();


   return json_encode(  ["Status"=>true,"Msg"=>"Registrado Correctamente ","obj"=>$model]  );
        

    }




}
