<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'cedula_ruc', 'nombre', 'apellidos', 'empresa', 'direccion', 'ciudad', 'telefono', 'pais'
    ];

    //query scope

    public function scopeName($query, $ci_ruc){

        if($ci_ruc)
            return $query->where('cedula_ruc', 'LIKE', "%$ci_ruc%");
    
    }

}
