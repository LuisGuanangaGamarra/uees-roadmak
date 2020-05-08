<?php

use Illuminate\Database\Seeder;

class PlantillaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Plantilla::class, 1)->create();
    }
}
