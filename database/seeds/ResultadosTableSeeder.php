<?php

use Illuminate\Database\Seeder;

class ResultadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Resultados::class, 10)->create();
    }
}
