<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    public $table = "plantilla";
    protected $fillable = ['name', 'descripcion', 'plantilla','anios'];


        //RELACION UNO A MUCHOS
    public function  ConsultoriaPlantilla()
    {
        return $this->belongsTo(ConsultoriaPlantilla::class);
    }



    
   
}
