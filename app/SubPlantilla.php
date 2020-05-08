<?php

namespace App;
use App\PlantillaSubPlantilla;

use Illuminate\Database\Eloquent\Model;

class SubPlantilla extends Model
{
    protected $fillable = ['name'];

    protected $table = 'sub_plantilla';//sub_plantilla


    public function subplantilla_ById($ci_id,$id){

        $count = PlantillaSubPlantilla::where('subplantilla_id', $id)->where('consult_comprada_id', $ci_id)->count();
    //     $c_i = Plantillas::find($id);
    // //  dd($c_i);
    // $arreglo=array();
    // array_push($arreglo,$c_i);
    if($count > 0){
        return true;
    }
        return null;
    }
  
}

