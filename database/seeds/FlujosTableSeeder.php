<?php

use Illuminate\Database\Seeder;

class FlujosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Flujos::class, 10)->create();
    }
}
