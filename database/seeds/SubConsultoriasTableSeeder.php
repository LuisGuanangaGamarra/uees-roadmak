<?php

use Illuminate\Database\Seeder;
use App\SubConsultorias;

class SubConsultoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubConsultorias::create(['name'=>'Análisis y Diagnóstico Financiero',
                                 'grupo'=>24,
                                 'req_indice'=>true,
                                 'precio'=>'25,50',
                                 'estado'=>'A'
                                ]);

        SubConsultorias::create(['name'=>'Valoración',
                                'grupo'=>24,
                                'req_indice'=>true,
                                'precio'=>'25,50',
                                'estado'=>'A'
                                ]);
    }
}
