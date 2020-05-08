<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadosFinancieros extends Model
{
    protected $table = 'EstadosFinancieros';//sub_indices

    protected $fillable = ['name_estado'];

    public function Indices()
    {
         return $this->hasMany('App\Indice'); 
         //return $this->belongsTo('App\Indice'); 
         
    }
    
    //protected $fillable = ['tipo_antena', 'polaridad_id']; //En la migración te recomiendo usar polaridad_id para mantener la nomenclatura estándar y evitar posibles errores

}
