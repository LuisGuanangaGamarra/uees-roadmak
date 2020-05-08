<?php

use Illuminate\Database\Seeder;
use App\ConsultoriasCompradas;
class ConsultoriasCompradasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consultoriasCompradas = ConsultoriasCompradas::create([
            'cliente' => '1',
            'consultorias' => '1', 
            'consultor' => '2', 
            'estado'=>NULL,
            'archivo'=>NULL,
           
        ]);

        $consultoriasCompradas = ConsultoriasCompradas::create([
            'cliente' => '3',
            'consultorias' => '2', 
            'consultor' => '2', 
            'estado'=>NULL,
            'archivo'=>NULL,
           
        ]);

        $consultoriasCompradas = ConsultoriasCompradas::create([
            'cliente' => '1',
            'consultorias' => '1', 
            'consultor' => '2', 
            'estado'=>NULL,
            'archivo'=>NULL,
           
        ]);

        $consultoriasCompradas = ConsultoriasCompradas::create([
            'cliente' => '3',
            'consultorias' => '2', 
            'consultor' => '2', 
            'estado'=>NULL,
            'archivo'=>NULL,
           
        ]);

        $consultoriasCompradas = ConsultoriasCompradas::create([
            'cliente' => '1',
            'consultorias' => '1', 
            'consultor' => '2', 
            'estado'=>NULL,
            'archivo'=>NULL,
           
        ]);

        $consultoriasCompradas = ConsultoriasCompradas::create([
            'cliente' => '3',
            'consultorias' => '2', 
            'consultor' => '2', 
            'estado'=>NULL,
            'archivo'=>NULL,
           
        ]);

        
    }
}
