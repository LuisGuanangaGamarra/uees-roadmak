<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use App\ConsultoriaPlantilla;
use App\User;
use App\Plantilla;
use App\Cliente;
use App\SectorEconomico;
use App\SubConsultorias;
use App\Informe;

class ConsultoriasCompradas extends Model
{
    protected $fillable = ['cliente', 'consultorias','num_periodos', 'consultor','datos_compra', 'estado','archivo','fecha_asignada','created_at', 'updated_at'];



    //RELACIÓN DE UNA CONSULTORIA-INDICE TIENE MUCHOS INDICES
    public function user()
    {
        return $this->hasMany('App\User','id');
    } 


    public function datosCompra()
    {
        return $this->hasMany('App\Cliente','id');
    } 



      //RELACIÓN DE UNA CONSULTORIA-INDICE TIENE MUCHOS INDICES
      public function  plantilla()
      {
          return $this->hasMany('App\Plantilla','id');
      } 
  


      //RELACIÓN DE UNA CONSULTORIA-INDICE TIENE MUCHOS INDICES
      public function cliente()
      {
          
          return $this->hasMany('App\Cliente','id');
      } 

      public static function cliente_ById($id)
      {
          
        $usuario= Cliente::find($id);
        $arreglo=array();
        array_push($arreglo,$usuario);
        return $arreglo;
      }


  
      public function usuario_ById($id)
      {

            $usuario= User::find($id);
            $arreglo=array();
            array_push($arreglo,$usuario);
           // dd($arreglo);
          return $arreglo;
      } 


      public static function usuario_static_ById($id)
      {

            $usuario= User::find($id);
            $arreglo=array();
            array_push($arreglo,$usuario);
           // dd($arreglo);
          return $arreglo;
      } 
  


    public static function consultoria($id_product){
        //dd($id_product);
        $client = new Client([
            'base_uri' => 'http://localhost:3988/api/',
            'timeout'  => 2.0,
        ]);

        $response2 = $client->request('GET', 'consultorias_id/'.$id_product);
        $datosid=json_decode($response2->getBody()->getContents());
        $datos2id = $datosid->consultorias;  

        return $datos2id;
    }




    
    public static function consultoriaPlantilla_byId($id){
        $c_i = ConsultoriaPlantilla::find($id);
      //  dd($c_i);
      $arreglo=array();
      array_push($arreglo,$c_i);
        return $arreglo;
    }


    public static function Plantilla_byId(){
        $c_i = Plantilla::all();
      //  dd($c_i);
     
        $arreglo=$c_i;
        return $arreglo;
    }




       
    public function consultoriaPlantilla(){
        return $this->hasMany('App\ConsultoriaPlantilla','id');
    }


    public function indice_ById($id){
        $c_i = Plantillas::find($id);
      //  dd($c_i);
      $arreglo=array();
      array_push($arreglo,$c_i);
        return $arreglo;
    }


    public static function indice_ById_static($id){
        $c_i = Plantillas::find($id);
      //  dd($c_i);
      //$arreglo=array();
      //array_push($arreglo,$c_i);
        return $c_i;
    }



    public static function sectorEconomicoById($id){
        $sector_economico = SectorEconomico::find($id);
        return $sector_economico;
    }

    public static function subConsultoriaById($id)
    {
        
      $subConsultoria= SubConsultorias::find($id);
      return $subConsultoria;
    }



    public function isInforme($id_consuloria_comprada){
        
        $datos_informe_x_consultoria_comprada= Informe::where('idcompra',$id_consuloria_comprada)->first();
        if($datos_informe_x_consultoria_comprada){
            return 1;
        }else{
            return 0;
        }
      //  return $datos_informe_x_consultoria_comprada;
    }

/*     public function obtenerPdf(){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    } */


}
