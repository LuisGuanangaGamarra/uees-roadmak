<?php

use Illuminate\Database\Seeder;

class ConsultoriaPlantillaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ConsultoriaPlantilla::class, 10)->create();
    }
}
