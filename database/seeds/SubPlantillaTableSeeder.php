<?php

use Illuminate\Database\Seeder;
use App\SubPlantilla;

class SubPlantillaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubPlantilla::create(['name'=>'Prueba ácida']);
        SubPlantilla::create(['name'=>'Nivel de endeudamiento']);
        SubPlantilla::create(['name'=>'Estado de situación financiera']);
    }
}