<?php

use Illuminate\Database\Seeder;
use App\EstadosFinancieros;
class EstadosFinancierosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $estadosFinancieros = EstadosFinancieros::create([
            'name_estado' => 'ESTADOS DE RESULTADOS INTEGRALES'
        ]);

        $estadosFinancieros = EstadosFinancieros::create([
            'name_estado' => 'ESTADOS DE COSTOS DE PRODUCCIÓN'
        ]);


        $estadosFinancieros = EstadosFinancieros::create([
            'name_estado' => 'ESTADOS DE SITUACIÓN FINANCIERA'
        ]);

        $estadosFinancieros = EstadosFinancieros::create([
            'name_estado' => 'ESTADOS DE SITUACIÓN FINANCIERA RESUMIDOS'
        ]);


        $estadosFinancieros = EstadosFinancieros::create([
            'name_estado' => 'ESTADOS DE FLUJOS DE EFECTIVO PROYECTADOS'
        ]);

        $estadosFinancieros = EstadosFinancieros::create([
            'name_estado' => 'SECTOR ECONOMICO'
        ]);


    }
}
