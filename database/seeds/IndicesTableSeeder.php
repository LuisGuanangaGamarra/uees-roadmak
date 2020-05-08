<?php

use Illuminate\Database\Seeder;
use App\Indice;

class IndicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //indices de estados de resultado
        Indice::create([
            'name' => 'Margen Bruto',
            'formula' => '=E25/E13',
            'estadosfinancieros_id' => 1,
            'posicion_cuenta' => 'C78', 
            'posicion_formula' => 'E78'
        ]);

        Indice::create([
            'name' => 'Margen Operativo',
            'formula' => '=E51/E13',
            'estadosfinancieros_id' => 1,
            'posicion_cuenta' => 'C79', 
            'posicion_formula' => 'E79'
        ]);

        Indice::create([
            'name' => 'Tasa Efectiva de impuestos',
            'formula' => '=E68/E66',
            'estadosfinancieros_id' => 1,
            'posicion_cuenta' => 'C83', 
            'posicion_formula' => 'E83'
        ]);

        //indices de estados de costos de produccion
        Indice::create([
            'name' => 'Proporción MPC/Costo Producción',
            'formula' => '=(E101/E114)',
            'estadosfinancieros_id' => 2,
            'posicion_cuenta' => 'C127', 
            'posicion_formula' => 'E127'
        ]);

        Indice::create([
            'name' => 'Proporción MOD/Costo Producción',
            'formula' => '=E107/E114',
            'estadosfinancieros_id' => 2,
            'posicion_cuenta' => 'C128', 
            'posicion_formula' => 'E128'
        ]);

        Indice::create([
            'name' => 'Proporción CIF/Costo Producción',
            'formula' => '=E112/E114',
            'estadosfinancieros_id' => 2,
            'posicion_cuenta' => 'C129', 
            'posicion_formula' => 'E129'
        ]);

        Indice::create([
            'name' => 'Días Rotación Materia Prima',
            'formula' => '=-E100*360/E101',
            'estadosfinancieros_id' => 2,
            'posicion_cuenta' => 'C133', 
            'posicion_formula' => 'E133'
        ]);

        Indice::create([
            'name' => 'Días Rotación Productos en Proceso',
            'formula' => '=-E117*360/E118',
            'estadosfinancieros_id' => 2,
            'posicion_cuenta' => 'C134', 
            'posicion_formula' => 'E134'
        ]);

        Indice::create([
            'name' => 'Días Rotación Productos Terminados',
            'formula' => '=-E121*360/E122',
            'estadosfinancieros_id' => 2,
            'posicion_cuenta' => 'C135', 
            'posicion_formula' => 'E135'
        ]);

        //indicesde balance general
        Indice::create([
            'name' => 'Días de Cobro Venta Nacional',
            'formula' => '=E151*360/E8',
            'estadosfinancieros_id' => 3,
            'posicion_cuenta' => 'C238', 
            'posicion_formula' => 'E238'
        ]);

        Indice::create([
            'name' => 'Días de Cobro Exportación',
            'formula' => '=E152*360/E9',
            'estadosfinancieros_id' => 3,
            'posicion_cuenta' => 'C239', 
            'posicion_formula' => 'E239'
        ]);


        Indice::create([
            'name' => 'Días de Cobro Relacionados',
            'formula' => '=E153*360/E10',
            'estadosfinancieros_id' => 3,
            'posicion_cuenta' => 'C240', 
            'posicion_formula' => 'E240'
        ]);


        Indice::create([
            'name' => 'Días de Inventario Mercaderías',
            'formula' => '=-E20*360/E21',
            'estadosfinancieros_id' => 3,
            'posicion_cuenta' => 'C241', 
            'posicion_formula' => 'E241'
        ]);

         

        Indice::create([
            'name' => 'Días de Pago Proveedores locales',
            'formula' => '=E194*360/(E17+E97)',
            'estadosfinancieros_id' => 3,
            'posicion_cuenta' => 'C243', 
            'posicion_formula' => 'E243'
        ]);

        Indice::create([
            'name' => 'Días de Pago Importaciones',
            'formula' => '=E195*360/(E18+E98)',
            'estadosfinancieros_id' => 3,
            'posicion_cuenta' => 'C244', 
            'posicion_formula' => 'E244'
        ]);

        Indice::create([
            'name' => 'Días de Pago Relacionados',
            'formula' => '=E196*360/(E19+E99)',
            'estadosfinancieros_id' => 3,
            'posicion_cuenta' => 'C245', 
            'posicion_formula' => 'E245'
        ]);

        Indice::create([
            'name' => 'CICLO CONVERSIÓN EFECTIVO',
            'formula' => '=(E238+E241)-E243',
            'estadosfinancieros_id' => 3,
            'posicion_cuenta' => 'C248', 
            'posicion_formula' => 'E248'
        ]);

        //indices de eatado flujo efectivo

        Indice::create([
            'name' => 'Retorno sobre ventas (ROS)',
            'formula' => '=E69/E13',
            'estadosfinancieros_id' => 4,
            'posicion_cuenta' => 'C277', 
            'posicion_formula' => 'E277'
        ]);

        Indice::create([
            'name' => 'Retorno sobre activos (ROA)',
            'formula' => '=F69/E262',
            'estadosfinancieros_id' => 4,
            'posicion_cuenta' => 'C278', 
            'posicion_formula' => 'E278'
        ]);

        Indice::create([
            'name' => 'Retorno sobre patrimonio (ROE)',
            'formula' => '=F69/E267',
            'estadosfinancieros_id' => 4,
            'posicion_cuenta' => 'C279', 
            'posicion_formula' => 'E279'
        ]);


        Indice::create([
            'name' => 'Estructura de Capital (D/A)',
            'formula' => '=(E265+E266)/E262',
            'estadosfinancieros_id' => 4,
            'posicion_cuenta' => 'C280', 
            'posicion_formula' => 'E280'
        ]);

        Indice::create([
            'name' => 'Apalancamiento (A/P)',
            'formula' => '=E262/E267',
            'estadosfinancieros_id' => 4,
            'posicion_cuenta' => 'C281', 
            'posicion_formula' => 'E281'
        ]);
        
        Indice::create([
            'name' => 'Grado Apalancamiento Financiero (GAF)',
            'formula' => '=E63/E66',
            'estadosfinancieros_id' => 4,
            'posicion_cuenta' => 'C282', 
            'posicion_formula' => 'E282'
        ]);
        
        Indice::create([
            'name' => 'Necesidades Operativas de Fondos (NOF)',
            'formula' => '=(E170-E259)-(E206+E213+E214-E265)',
            'estadosfinancieros_id' => 4,
            'posicion_cuenta' => 'C260', 
            'posicion_formula' => 'E260'
        ]);

        Indice::create([
            'name' => 'NOF sobre Ventas',
            'formula' => '=E260/(E8+E9)',
            'estadosfinancieros_id' => 4,
            'posicion_cuenta' => 'C275', 
            'posicion_formula' => 'E275'
        ]);
        
        Indice::create([
            'name' => 'Fondo de Maniobra',
            'formula' => '=E266+E267-E261',
            'estadosfinancieros_id' => 4,
            'posicion_cuenta' => 'C270', 
            'posicion_formula' => 'E270'
        ]);


    }
}
