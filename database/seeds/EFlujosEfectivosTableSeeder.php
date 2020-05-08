<?php

use Illuminate\Database\Seeder;

class EFlujosEfectivosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\EstadosFlujosEfectivo::class, 10)->create();
    }
}
