<?php

use Illuminate\Database\Seeder;

class GaleriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Galeria::class, 10)->create();
    }
}
