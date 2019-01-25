<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Epayco\Epayco;
class EpayCoController extends Controller
{
    
    
 /*
  * Epay Co Credentials
  * P_CUST_ID_CLIENTE   21609
  * P_KEY:  b6a52066a274aea2f3037975402477aa1876ce24
  * 
  * 
  * Api rest
  * PUBLIC_KEY  951bc06fec5787563e69e306f28f208f
  * PRIVATE_KEY ecc09125a7d22fe48c1f73eb983933ca
  * 
  * 
  */
    
    
   
    
    
    function AddCretidCard(Request $request) {
        $epayco = $this->GetConfig();
        
        $token = $epayco->token->create(array(
    "card[number]" => $request->input("cardNumber"),
    "card[exp_year]" => $request->input("anioExpiracion"),
    "card[exp_month]" => $request->input("mesExpiracion") ,
    "card[cvc]" => $request->input("CodigoSeguridad")
));

     //  dd( $token); 
            
 if( $token->status == false ){
     
     return json_encode(["status"=>false,"msg"=>$token->data->description]);
     
     
 }else{
     
            $customer = $epayco->customer->create(array(
    "token_card" =>  $token->data->id,
    "name" => $request->input("nombreUsuario"),
    "email" => $request->input("emailUsuario"),
    "phone" => $request->input("telefono"),
    "default" => true
));
        
 return  json_encode($customer); 
     
 } 
        
        
        
     
       
    }
    
    
    
    
    
    
    
    function GetConfig() {
        
        $epayco = new Epayco(array(
    "apiKey" => "951bc06fec5787563e69e306f28f208f",
    "privateKey" => "ecc09125a7d22fe48c1f73eb983933ca",
    "lenguage" => "ES",
    "test" => true
));
 
        return $epayco;
        
        
    } 
    
    
}
