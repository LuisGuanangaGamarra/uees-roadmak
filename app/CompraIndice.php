<?php

namespace App;
use App\Indice;

use Illuminate\Database\Eloquent\Model;

class CompraIndice extends Model
{
    protected $fillable = [
        'id_compra','id_indice'
    ];

    public function getName($id){
        if($id){
            $indice = Indice::find($id);
            return $indice->name;
        }
    }
}
