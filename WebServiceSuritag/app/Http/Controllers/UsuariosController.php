<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosModel;
use PHPUnit\Framework\MockObject\Stub\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\EmailModel;


class UsuariosController extends Controller
{
 



function GetAll(){
 $modelo  = new UsuariosModel();

 $res = $modelo->all();

 return json_encode($res );



}


function getUserById(Request $request){
 $modelo =  DB::table("Usuarios")
   
   ->join("TipoUsuarios","Usuarios.TipoUsuarios_idTipoUsuario","=","TipoUsuarios.idTipoUsuario")
   ->where("Usuarios.idUsuario",$request->input("idUser"))
   ->select("Usuarios.*","TipoUsuarios.*")->get()->first()
   
   ;



 return json_encode($modelo);




} 
function getUserByEmail(Request $request){

    $modelo =  DB::table("usuarios")
   
    ->join("tipousuarios","usuarios.TipoUsuarios_idTipoUsuario","=","tipousuarios.idTipoUsuario")
    ->where("usuarios.CorreoUsuario",$request->input("correo"))
    ->select("usuarios.*","tipousuarios.*")->get()->first()
    
    ;
 
 
 
  return json_encode($modelo);



}








function GetClients(){

$model = new UsuariosModel();

//$model = $model->where("TipoUsuarios_idTipoUsuario",2)->get();  

$model = DB::table("usuarios")
->join("tipousuarios","usuarios.TipoUsuarios_idTipoUsuario","=","tipousuarios.idTipoUsuario")
->where("TipoUsuarios_idTipoUsuario",3)
->orWhere("TipoUsuarios_idTipoUsuario",4)
->select("usuarios.*","tipousuarios.*")->orderBy("usuarios.fechaCreacion","desc")->get();





return  json_encode(["Msg"=>"lista","Status"=>true,"value"=>$model]);


}



function RegistrarUsuario(Request $request){
    $modelo  = new UsuariosModel();
    $result;
    
    $modelo = $modelo->where("UsuarioIDUsuario",$request->get("CorreoUsuario"))->get()->first(); 
    
    if($modelo == null){
      $modelo  = new UsuariosModel();
      
      $modelo->NombreUsuario = $request->get("NombreUsuario");
    $modelo->ImagenUsuario = $request->get("ImagenUsuario");
    $modelo->TelefonoUsuario = $request->get("TelefonoUsuario");
    $modelo->CorreoUsuario = $request->get("CorreoUsuario");
    $modelo->direccionFisicaUsuario = $request->get("direccionFisicaUsuario");
    $modelo->UsuarioIDUsuario = $request->get("CorreoUsuario");
    $modelo->claveDeAccesoUsuario =  hash("sha256",  $request->get("TelefonoUsuario"),false);  
    $modelo->AceptoTerminos = 1;
    $modelo->ConfirmedEmail = 0;
    $modelo->TipoUsuarios_idTipoUsuario = $request->get("TipoUsuarios_idTipoUsuario");
     $modelo->save();
   
    
     $response = ["Status"=>true,"Msg"=>"Guardado Correctamente","obj"=>$modelo];
      return json_encode($response);  
    }else{
         $response = ["Status"=>true,"Msg"=>"Usuario ya Registrado","obj"=>$modelo];
      return json_encode($response);  
        
        
    }
    
  


 
    

  


    



}

function EditarUsuario(Request $request){
    $modelo  = new UsuariosModel();
$modelo = $modelo->find($request->input("idUsuario"));

$modelo->NombreUsuario = $request->get("NombreUsuario");
    $modelo->ImagenUsuario = $request->get("ImagenUsuario");
    $modelo->TelefonoUsuario = $request->get("TelefonoUsuario");
    $modelo->CorreoUsuario = $request->get("CorreoUsuario");
    $modelo->direccionFisicaUsuario = $request->get("direccionFisicaUsuario");
    $modelo->UsuarioIDUsuario = $request->get("CorreoUsuario");
    $modelo->claveDeAccesoUsuario =  hash("sha256", $request->get("TelefonoUsuario")  ,false);  
    $modelo->AceptoTerminos = 1;
    $modelo->ConfirmedEmail = 0;
    $modelo->TipoUsuarios_idTipoUsuario = $request->get("TipoUsuarios_idTipoUsuario");

  

   try{
    $modelo->save();

  
    


     $response = ["Status"=>true,"Msg"=>"Guardado Correctamente","obj"=>$modelo];

return json_encode($response);


   }catch(Exception $ex){
    $response = ["Status"=>false,"Msg"=>"Error al Guardar","obj"=>null];
    return json_encode($response);
    

   }

    



}






function Login(Request $request ){
    $modelo  = new UsuariosModel();
$user = $request->input("Usuario");
$pass  = $request->input("password");




 $result =   $modelo->where([
    ["UsuarioIDUsuario","=",$user],
    ["claveDeAccesoUsuario","=",hash("sha256", $pass ,false)]

])->get()->first();
//dd($result);
if( $result == null  ){
 return json_encode(["Status"=>false,"Msg"=>"Usuario o Contraseña Incorrecta","obj"=>null]);

}else{
  return  json_encode(["Status"=>true,"Msg"=>"Usuario Encontrado", "obj"=>$result  ]);
}
    


}

function AccessPlatform (Request $request ){
    $modelo  = new UsuariosModel();

    $modelo = $modelo->find($request->input("idUsuario"));
    
     if($modelo->Plataforma == 1){
return json_encode(["msg"=>"El usuario ya tiene una cuenta creada","status"=>false]);
         
     }else{
         
         $modelo->NombreUsuario = $request->get("NombreUsuario");
  $modelo->TelefonoUsuario = $request->get("TelefonoUsuario");
    $modelo->CorreoUsuario = $request->get("CorreoUsuario");
    $modelo->direccionFisicaUsuario = $request->get("direccionFisicaUsuario");
     $modelo->AceptoTerminos = 1;
    $modelo->ConfirmedEmail = 0;
    $modelo->Plataforma = 0;
  
  $modelo->save();

   // $body = new EmailModel();
  // $body->CorreoUsuario = $modelo->CorreoUsuario;
  // $body->telefono = $modelo->TelefonoUsuario;
   
   
 //$from = "test@hostinger-tutorials.com";
    $to =  $modelo->CorreoUsuario; //$modelo->CorreoUsuario;
    $subject = "Registro exito";
    $message = "Bienvenido a Suritag \r\nSus datos de Acceso son \r\nUsuario: ".$modelo->NombreUsuario."\r\nClave de Acceso:".$modelo->TelefonoUsuario."\r\nIngrese al siguiente link para confirmar sus datos\r\nhttps://www.suritag.com/AdministrativoSuritag/ConfirmarCuenta.html?TokenUser=".$modelo->idUsuario;
   // $headers = "From:" . $from;
    mail($to,$subject,$message);
  
//  Mail::to($modelo->CorreoUsuario)->send(new  MakeEmail($body) );

return json_encode(["msg"=>"Guardado","status"=>true]);
         
         
         
     }
    



}


function ConfirmarEmail(Request $request) {
     
  $idUsuario  = $request->input("idUsuario");
   
    $modelo  = new UsuariosModel();
    
   $modelo = $modelo->find($idUsuario);
   
   $modelo->ConfirmedEmail = 1;
    $modelo->Plataforma = 1;
   $modelo->save();
return json_encode(["msg"=>"correcto","status"=>true]);   
    
    
}

function CambiarPass(Request $request){
   
  $idUsuario  = $request->input("idUsuario");
   
    $modelo  = new UsuariosModel();
     
   $modelo  =   $modelo->find($idUsuario);
   
   $modelo->claveDeAccesoUsuario = hash("sha256", $request->get("password")  ,false); 
   $modelo->save();
   
   return json_encode(["Msg"=>"Cambio exitoso"]);
    
  
  
    
    
}












}
