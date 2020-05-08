<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EstadosFinancieros;
class Cuentas extends Model
{
    protected $fillable = ['name', 'formula','posicion_cuenta','posicion_formula', 'id_estado_financiero']; 

    public static function estadoFinancieroById($id){
        $estadofinanciero = EstadosFinancieros::find($id);
        return $estadofinanciero;
    }

}
