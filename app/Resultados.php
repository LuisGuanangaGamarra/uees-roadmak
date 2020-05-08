<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultados extends Model
{
    public $table = "resultados";
    protected $fillable = ['name', 'type_1']; //, 'type_2'
}
