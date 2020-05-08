<?php

namespace App;

use App\Plantilla;
use App\SubPlantilla;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class ConsultoriaPlantilla extends Model
{
   
    protected $fillable = ['id_consultoria','id_plantilla'];
    //
    //consultoria_plantillas
    protected $table = 'consultoria_plantilla';
    //RELACIÓN DE UNA CONSULTORIA-PLANTILLA TIENE MUCHOS INDICES
     public function plantilla()
    {
        return $this->hasMany('App\Plantilla','id');
    } 

    //RELACIÓN DE UNA CONSULTORIA-INDICE TIENE MUCHAS CONSUTORIAS

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

        public function plantilla_ById($id){
            $c_i = Plantilla::find($id);
        //  dd($c_i);
        $arreglo=array();
        array_push($arreglo,$c_i);
            return $arreglo;
        }


        public function subplantilla_ById($id){
            $c_i = Plantilla::find($id);
        //  dd($c_i);
        $arreglo=array();
        array_push($arreglo,$c_i);
            return $arreglo;
        }

     
     
}
