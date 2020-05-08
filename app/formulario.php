<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SectorEconomico;

class formulario extends Model
{
    protected $fillable = ['idconsultoria','respuesta1','respuesta2','respuesta3','respuesta4','respuesta5','respuesta6','formulariopdf'];



    public static function sectorEconomicoById($id){
        $sector_economico = SectorEconomico::find($id);
        return $sector_economico;
    }


}
