<?php

namespace App;
use App\SubPlantilla;

use Illuminate\Database\Eloquent\Model;

class PlantillaSubPlantilla extends Model
{
    //protected $fillable = ['consult_indice_id', 'subindice_id']; --JNI 25/04/2019
    protected $fillable = ['consult_comprada_id', 'subplantilla_id'];

    protected $table = 'plantilla_sub_plantilla';

    public function getName($id){
        if($id){
            $subplantilla = SubPlantilla::find($id);
            return $subplantilla->name;
        }
    }
}
