<?php

use Illuminate\Database\Seeder;

class ESituacionFinancieraResumidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\EstadosSituacionFinancieraResumidos::class, 10)->create();
    }
}
