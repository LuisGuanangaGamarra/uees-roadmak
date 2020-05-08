<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectorEconomico extends Model
{
    public $table = "sectoreconomico";
    protected $fillable = ['name', 'beta'];
}
