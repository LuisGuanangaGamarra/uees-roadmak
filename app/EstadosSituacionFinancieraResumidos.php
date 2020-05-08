<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadosSituacionFinancieraResumidos extends Model
{
    protected $fillable = ['idconsultoria','name', 'periodo1', 'periodo2', 'periodo3'];

}
