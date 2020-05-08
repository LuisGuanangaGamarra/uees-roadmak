<?php

namespace App;
use App\CompraIndice;
use Illuminate\Database\Eloquent\Model;

class Indice extends Model
{

    protected $table = 'indices';
    protected $fillable = ['name', 'formula','posicion_cuenta','posicion_formula', 'estadosfinancieros_id']; 

    public function indice_ById($id_compra,$id_indice){

        $count = CompraIndice::where('id_indice', $id_indice)->where('id_compra', $id_compra)->count();
    //     $c_i = Plantillas::find($id);
    // //  dd($c_i);
    // $arreglo=array();
    // array_push($arreglo,$c_i);
    if($count > 0){
        return true;
    }
        return null;
    }


    public function EstadosFinancieros()
    {
         return $this->belongsTo('App\EstadosFinancieros');
    }

}
