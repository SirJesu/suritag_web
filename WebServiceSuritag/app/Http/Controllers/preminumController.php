<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\premiumModel;

class preminumController extends Controller
{


function  getTypePlan(Request $request){
    $model = new premiumModel(); 

    $model = $model ->all();


    return json_encode($model);


}


}
