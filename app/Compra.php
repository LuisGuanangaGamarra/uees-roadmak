<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use App\SubConsultorias;
class Compra extends Model
{
    
    public function consultoria($id_product){
        //dd($id_product);
        $client = new Client([
            'base_uri' => 'http://localhost:3988/api/',
            'timeout'  => 2.0,
        ]);
    
        $response2 = $client->request('GET', 'consultorias_id/'.$id_product);
        $datosid=json_decode($response2->getBody()->getContents());
        $datos2id = $datosid->consultorias[0];  
    
        return $datos2id;
    }


    public static function subConsultoriaById($id)
    {
        
      $subConsultoria= SubConsultorias::find($id);
      return $subConsultoria;
    }

}


