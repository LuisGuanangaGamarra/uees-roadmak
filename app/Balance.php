<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $table = "balance";
    protected $fillable = ['name', 'type_1', 'type_2'];
}
