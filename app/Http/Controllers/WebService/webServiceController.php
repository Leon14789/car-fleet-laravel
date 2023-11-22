<?php

namespace App\Http\Controllers\WebService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Curl;

class webServiceController extends Controller
{
   public function cep(Request $request){

    $cep = $request->cep;
   
    $response = Curl::to('viacep.com.br/ws/'.$cep.'/json')->get();
    
    $response = json_decode($response);


    if ($response) {
        $data = (object) [
            'uf' => $response->uf,
            'zipCode' => $response->cep,
            'city' => $response->localidade,
        ];
        return json_encode($data);
    }

   }
}
