<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // La creación de permisos 
        $this->call(PermissionsTableSeeder::class);
        // La creación de datos de roles debe ejecutarse primero
        //$this->call(RoleTableSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ConsultoriasTableSeeder::class);
        //$this->call(BalanceTableSeeder::class);
        $this->call(ArticulosTableSeeder::class);
        $this->call(PlantillaTableSeeder::class);
        //$this->call(ConsultoriasCompradasSeeder::class);
        //$this->call(ResultadosTableSeeder::class);
        //$this->call(FlujosTableSeeder::class);
        $this->call(EResultadosIntegralesTableSeeder::class);
        $this->call(ESituacionFinancieraTableSeeder::class);
        $this->call(ESituacionFinancieraResumidoTableSeeder::class);
        $this->call(EFlujosEfectivosTableSeeder::class);
       // $this->call(SubPlantillaTableSeeder::class);
        $this->call(EstadosFinancierosTableSeeder::class);
        $this->call(IndicesTableSeeder::class);
        $this->call(SectorEconomicoTableSeeder::class);
        $this->call(SubConsultoriasTableSeeder::class);
        $this->call(CuentasTableSeeder::class);
        
       /*  $this->call(ConsultoriaPlantillaTableSeeder::class); */
       /*$this->call(InformeTableSeeder::class);
       $this->call(GaleriaTableSeeder::class);*/
    }
}
