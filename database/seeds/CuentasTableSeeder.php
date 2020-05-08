<?php

use Illuminate\Database\Seeder;
use App\Cuentas;
class CuentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

            //ESTADOS FINANCIERO
        /*
            1 	Estado Resultado 	--ESTADOS DE RESULTADOS INTEGRALES
            2 	Estados de Costos de Producción --ESTADOS DE COSTOS DE PRODUCCIÓN
            3 	Balance General --ESTADOS DE SITUACIÓN FINANCIERA
            4   Balance General --ESTADOS DE SITUACIÓN FINANCIERA RESUMIDOS
            5 	Estado Flujo Efectivo --ESTADOS DE FLUJOS DE EFECTIVO PROYECTADOS
        */

        ///////////////////////////////////     1        //////////////////////////////////////////


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ingresos', 
            'formula' => "", 
            'posicion_cuenta' => 'B7', 
            'posicion_formula' => 'E7'
        ]);


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ingresos.Ventas Locales', 
            'formula' => "='RESULTADOS'!H6+'RESULTADOS'!H10",
            'posicion_cuenta' => 'C8', 
            'posicion_formula' => 'E8'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ingresos.Expotaciones', 
            'formula' => "='RESULTADOS'!H7+'RESULTADOS'!H11", 
            'posicion_cuenta' => 'C9',             
            'posicion_formula' => 'E9'
        ]);
        

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ingresos.Ventas y Exportaciones a relacionados', 
            'formula' => "='RESULTADOS'!H4+'RESULTADOS'!H5+'RESULTADOS'!H8+'RESULTADOS'!H9", 
            'posicion_cuenta' => 'C10', 
            'posicion_formula' => 'E10'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ingresos.Otros Ingresos', 
            'formula' => "=SUM('RESULTADOS'!H12:H60)+SUM('RESULTADOS'!H69:H73)", 
            'posicion_cuenta' => 'C11', 
            'posicion_formula' => 'E11'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ingresos.Rendimientos Financieros', 
            'formula' => "=SUM('RESULTADOS'!H61:H68)", 
            'posicion_cuenta' => 'C12', 
            'posicion_formula' => 'E12'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Total Ingresos', 
            'formula' => "=SUM(E8:E12)", 
            'posicion_cuenta' => 'B13', 
            'posicion_formula' => 'E13'
        ]);
        

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Costo de Ventas', 
            'formula' => "", 
            'posicion_cuenta' => 'B15', 
            'posicion_formula' => 'E15'
        ]);
 


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Costo de Ventas.Inventario Inicial', 
            'formula' => "='RESULTADOS'!H79", 
            'posicion_cuenta' => 'C16', 
            'posicion_formula' => 'E16'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Costo de Ventas.Compras locales de mercaderías', 
            'formula' => "='RESULTADOS'!H82", 
            'posicion_cuenta' => 'C17', 
            'posicion_formula' => 'E17'
        ]);
        

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Costo de Ventas.Importaciones de mercaderías', 
            'formula' => "='RESULTADOS'!H83", 
            'posicion_cuenta' => 'C18', 
            'posicion_formula' => 'E18'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Costo de Ventas.Compras e Importaciones a relacionados', 
            'formula' => "='RESULTADOS'!H80+'RESULTADOS'!H81", 
            'posicion_cuenta' => 'C19', 
            'posicion_formula' => 'E19'
        ]);


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Costo de Ventas.Inventario Final', 
            'formula' => "='RESULTADOS'!H84", 
            'posicion_cuenta' => 'C20', 
            'posicion_formula' => 'E20'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Costo de Ventas.Costos de Ventas mercaderías', 
            'formula' => "=SUM(E16:E20)", 
            'posicion_cuenta' => 'C21', 
            'posicion_formula' => 'E21'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Costo de Ventas.Costos de Ventas bienes fabricados', 
            'formula' => "=E122", 
            'posicion_cuenta' => 'C22', 
            'posicion_formula' => 'E22'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Total Costo de Ventas', 
            'formula' => "=E21+E22", 
            'posicion_cuenta' => 'B23', 
            'posicion_formula' => 'E23'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Utilidad Bruta', 
            'formula' => "=E13+E23", 
            'posicion_cuenta' => 'B25', 
            'posicion_formula' => 'E25'
        ]);


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales', 
            'formula' => "", 
            'posicion_cuenta' => 'B27', 
            'posicion_formula' => 'E27'
        ]);


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.Sueldos, Beneficios y Aportes', 
            'formula' => "='RESULTADOS'!H153+'RESULTADOS'!H154+'RESULTADOS'!H155+'RESULTADOS'!H158+'RESULTADOS'!H159", 
            'posicion_cuenta' => 'C28', 
            'posicion_formula' => 'E28'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.Honorarios Profesionales', 
            'formula' => "='RESULTADOS'!H156+'RESULTADOS'!H157+'RESULTADOS'!H160", 
            'posicion_cuenta' => 'C29', 
            'posicion_formula' => 'E29'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.promoción y publicidad', 
            'formula' => "='RESULTADOS'!H197", 
            'posicion_cuenta' => 'C30', 
            'posicion_formula' => 'E30'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.transporte', 
            'formula' => "='RESULTADOS'!H198", 
            'posicion_cuenta' => 'C31', 
            'posicion_formula' => 'E31'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.consumo de combustibles y lubricantes', 
            'formula' => "='RESULTADOS'!H199",
            'posicion_cuenta' => 'C32', 
            'posicion_formula' => 'E32'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.gastos de viaje', 
            'formula' => "='RESULTADOS'!H200",
            'posicion_cuenta' => 'C33', 
            'posicion_formula' => 'E33'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.gastos de gestión', 
            'formula' => "='RESULTADOS'!H201", 
            'posicion_cuenta' => 'C34', 
            'posicion_formula' => 'E34'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.arrendamientos operativos', 
            'formula' => "='RESULTADOS'!H202", 
            'posicion_cuenta' => 'C35', 
            'posicion_formula' => 'E35'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.suministros, herramientas, materiales y repuestos', 
            'formula' => "='RESULTADOS'!H203", 
            'posicion_cuenta' => 'C36', 
            'posicion_formula' => 'E36'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.mantenimiento y reparaciones',
            'formula' => "='RESULTADOS'!H205",
            'posicion_cuenta' => 'C37', 
            'posicion_formula' => 'E37'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.mermas',
            'formula' => "='RESULTADOS'!H206",
            'posicion_cuenta' => 'C38', 
            'posicion_formula' => 'E38'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.seguros y reaseguros (primas y cesiones)',
            'formula' => "='RESULTADOS'!H207",
            'posicion_cuenta' => 'C39', 
            'posicion_formula' => 'E39'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.gastos indirectos asignados desde el exterior por partes relacionadas',
            'formula' => "='RESULTADOS'!H208",
            'posicion_cuenta' => 'C40', 
            'posicion_formula' => 'E40'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.impuestos, contribuciones y otros',
            'formula' => "='RESULTADOS'!H209",
            'posicion_cuenta' => 'C41', 
            'posicion_formula' => 'E41'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.comisiones y similares',
            'formula' => "=SUM('RESULTADOS'!H210:H213)",
            'posicion_cuenta' => 'C42', 
            'posicion_formula' => 'E42'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.regalias, servicios técnicos, consultorias',
            'formula' => "=SUM('RESULTADOS'!H214:H217)",
            'posicion_cuenta' => 'C43', 
            'posicion_formula' => 'E43'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.instalación, organización y similares',
            'formula' => "='RESULTADOS'!H218",
            'posicion_cuenta' => 'C44', 
            'posicion_formula' => 'E44'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.iva que se carga al costo o gasto',
            'formula' => "='RESULTADOS'!H219",
            'posicion_cuenta' => 'C45', 
            'posicion_formula' => 'E45'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.servicios públicos',
            'formula' => "='RESULTADOS'!H220",
            'posicion_cuenta' => 'C46', 
            'posicion_formula' => 'E46'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.pérdidas por siniestros',
            'formula' => "='RESULTADOS'!H221",
            'posicion_cuenta' => 'C47', 
            'posicion_formula' => 'E47'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Generales.otros',
            'formula' => "='RESULTADOS'!H222",
            'posicion_cuenta' => 'C48', 
            'posicion_formula' => 'E48'
        ]);


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Total Gastos Generales',
            'formula' => "=SUM(E8:E48)",
            'posicion_cuenta' => 'B49', 
            'posicion_formula' => 'E49'
        ]);
        


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Utilidad Operativa (EBITDA)',
            'formula' => "=E25-E49",
            'posicion_cuenta' => 'C51', 
            'posicion_formula' => 'E51'
        ]);


            // Gastos no efectivos
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos no efectivos',
            'formula' => "",
            'posicion_cuenta' => 'B53', 
            'posicion_formula' => 'E53'
        ]);


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos no efectivos.Provisiones créditos incobrables',
            'formula' => "='RESULTADOS'!H177",
            'posicion_cuenta' => 'C54', 
            'posicion_formula' => 'E54'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos no efectivos.Depreciaciones',
            'formula' => "=SUM('RESULTADOS'!H161:H170)",
            'posicion_cuenta' => 'C55', 
            'posicion_formula' => 'E55'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos no efectivos.Amortizaciones',
            'formula' => "=SUM('RESULTADOS'!H171:H176)",
            'posicion_cuenta' => 'C56', 
            'posicion_formula' => 'E56'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos no efectivos.Deterioro',
            'formula' => "=SUM('RESULTADOS'!H178:H186)",
            'posicion_cuenta' => 'C57', 
            'posicion_formula' => 'E57'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos no efectivos.Provisiones varias',
            'formula' => "=SUM('RESULTADOS'!H187:H196)",
            'posicion_cuenta' => 'C58', 
            'posicion_formula' => 'E58'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos no efectivos.Pérdida en enajenación de acciones y otros',
            'formula' => "='RESULTADOS'!H204",
            'posicion_cuenta' => 'C59', 
            'posicion_formula' => 'E59'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos no efectivos.Otros',
            'formula' => "='RESULTADOS'!H239+'RESULTADOS'!H240+'RESULTADOS'!H241+'RESULTADOS'!H242+'RESULTADOS'!H243+'RESULTADOS'!H244",
            'posicion_cuenta' => 'C60', 
            'posicion_formula' => 'E60'
        ]);
        

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Total Gastos no Efectivos',
            'formula' => "=SUM(E54:E59)",
            'posicion_cuenta' => 'B61', 
            'posicion_formula' => 'E61'
        ]);


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Utilidad Operativa(EBIT)',
            'formula' => "=E51-E61",
            'posicion_cuenta' => 'B63', 
            'posicion_formula' => 'E66'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Gastos Financieros',
            'formula' => "=SUM('RESULTADOS'!H223:H238)",
            'posicion_cuenta' => 'C65', 
            'posicion_formula' => 'E65'
        ]);


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Utilidad antes de Impuestos',
            'formula' => "=E63-E65",
            'posicion_cuenta' => 'B66', 
            'posicion_formula' => 'E66'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Impuestos',
            'formula' => "='RESULTADOS'!H250+'RESULTADOS'!H252",
            'posicion_cuenta' => 'C68', 
            'posicion_formula' => 'E68'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Utilidad Neta',
            'formula' => "=E66-E68",
            'posicion_cuenta' => 'B69', 
            'posicion_formula' => 'E69'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Dividendos Declarados',
            'formula' => "",
            'posicion_cuenta' => 'C71', 
            'posicion_formula' => 'E71'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Utilidad a Reinvertir',
            'formula' => "=E69-E71",
            'posicion_cuenta' => 'B72', 
            'posicion_formula' => 'E72'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ratios para análisis/proyección',
            'formula' => "",
            'posicion_cuenta' => 'B75', 
            'posicion_formula' => 'E75'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ratios para análisis/proyección.Tasa de inversiones Temporales',
            'formula' => "",
            'posicion_cuenta' => 'C77', 
            'posicion_formula' => 'E77'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ratios para análisis/proyección.Tasa Provisión Incobrables',
            'formula' => "=E54/(E151+E152+E153)",
            'posicion_cuenta' => 'C80', 
            'posicion_formula' => 'E80'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ratios para análisis/proyección.Tasa Depreciación',
            'formula' => "=E55/E180",
            'posicion_cuenta' => 'C81', 
            'posicion_formula' => 'E81'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ratios para análisis/proyección.Tasa Interés Deudas',
            'formula' => "",
            'posicion_cuenta' => 'C82', 
            'posicion_formula' => 'E82'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '1',
            'name' => 'Ratios para análisis/proyección.Tasa Reparto Dividendos',
            'formula' => "=E71/E69",
            'posicion_cuenta' => 'C84', 
            'posicion_formula' => 'E84'
        ]);
        ///////////////////////////////////     2        //////////////////////////////////////////
        //titulo
/*         $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'ESTADOS DE COSTOS DE PRODUCCIÓN', 
            'formula' => "",
            'posicion_cuenta' => 'C91', 
            'posicion_formula' => 'E91'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'HISTORICOS Y PROYECTADOS', 
            'formula' => "",
            'posicion_cuenta' => 'C92', 
            'posicion_formula' => 'E92'
        ]); */

        //Materia Prima
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Materia Prima', 
            'formula' => "",
            'posicion_cuenta' => 'C95', 
            'posicion_formula' => 'E95'
        ]);


        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Materia Prima.Inventario Inicial de Materia Prima', 
            'formula' => "='RESULTADOS'!H85",
            'posicion_cuenta' => 'C96', 
            'posicion_formula' => 'E96'
        ]);
    
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Materia Prima.Compras Locales', 
            'formula' => "='RESULTADOS'!H88",
            'posicion_cuenta' => 'C97', 
            'posicion_formula' => 'E97'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Materia Prima.Importaciones', 
            'formula' => "='RESULTADOS'!H89",
            'posicion_cuenta' => 'C98', 
            'posicion_formula' => 'E98'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Materia Prima.Compras e Importaciones a relacionados', 
            'formula' => "='RESULTADOS'!H86+'RESULTADOS'!H87",
            'posicion_cuenta' => 'C99', 
            'posicion_formula' => 'E99'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Materia Prima.-Inventario Final de Materia Prima', 
            'formula' => "='RESULTADOS'!H90",
            'posicion_cuenta' => 'C100', 
            'posicion_formula' => 'E100'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Total Materia Prima Consumida', 
            'formula' => "=SUM(E96:E100)",
            'posicion_cuenta' => 'C101', 
            'posicion_formula' => 'E101'
        ]);

        // Mano de Obra 

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Mano de Obra', 
            'formula' => "",
            'posicion_cuenta' => 'C104', 
            'posicion_formula' => 'E104'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Mano de Obra.Sueldos y Salarios', 
            'formula' => "='RESULTADOS'!H96",
            'posicion_cuenta' => 'C104', 
            'posicion_formula' => 'E104'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Mano de Obra.Beneficios Sociales', 
            'formula' => "='RESULTADOS'!H97+'RESULTADOS'!H101+'RESULTADOS'!H102",
            'posicion_cuenta' => 'C105', 
            'posicion_formula' => 'E105'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Mano de Obra.Aportes al IESS', 
            'formula' => "='RESULTADOS'!H98",
            'posicion_cuenta' => 'C106', 
            'posicion_formula' => 'E106'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Total Mano de Obra Directa', 
            'formula' => "=SUM(E104:E106)",
            'posicion_cuenta' => 'C107', 
            'posicion_formula' => 'E107'
        ]);

        // Costos Indirectos Fabricación 
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Costos Indirectos Fabricación', 
            'formula' => "",
            'posicion_cuenta' => 'C110', 
            'posicion_formula' => 'E110'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Costos Indirectos Fabricación.CIF Desembolsables', 
            'formula' => "=SUM('RESULTADOS'!H130:H147)+'RESULTADOS'!H99+'RESULTADOS'!H100+'RESULTADOS'!H103",
            'posicion_cuenta' => 'C110', 
            'posicion_formula' => 'E110'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Costos Indirectos Fabricación.CIF No Desembolsables', 
            'formula' => "=SUM('RESULTADOS'!H104:H129)",
            'posicion_cuenta' => 'C111', 
            'posicion_formula' => 'E111'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Total Costos Indirectos de Fabricación', 
            'formula' => "=SUM(E110:E111)",
            'posicion_cuenta' => 'C112', 
            'posicion_formula' => 'E112'
        ]);

        //Producción total de la empresa
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Producción total de la empresa', 
            'formula' => "=E101+E107+E112",
            'posicion_cuenta' => 'C114', 
            'posicion_formula' => 'E114'
        ]);

        // Inventario Inicial Productos Proceso 
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Inventario Inicial Productos Proceso', 
            'formula' => "='RESULTADOS'!H91",
            'posicion_cuenta' => 'C116', 
            'posicion_formula' => 'E116'
        ]);

        // Inventario Final Productos Proceso
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Inventario Final Productos Proceso', 
            'formula' => "='RESULTADOS'!H92",
            'posicion_cuenta' => 'C117', 
            'posicion_formula' => 'E117'
        ]); 

        // Total Costo Productos Procesados 
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Total Costo Productos Procesados', 
            'formula' => "=E114+E116+E117",
            'posicion_cuenta' => 'C118', 
            'posicion_formula' => 'E118'
        ]); 

        // Inventario Inicial Productos Terminados 
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Inventario Inicial Productos Terminados', 
            'formula' => "='RESULTADOS'!H93",
            'posicion_cuenta' => 'C120', 
            'posicion_formula' => 'E120'
        ]);

        // Inventario Final Productos    Terminados 
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Inventario Final Productos Terminados', 
            'formula' => "='RESULTADOS'!H94+'RESULTADOS'!H95",
            'posicion_cuenta' => 'C121', 
            'posicion_formula' => 'E121'
        ]);

        // Total Costo de Ventas bienes fabricados 
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Total Costo de Ventas bienes fabricados', 
            'formula' => "=E118+E120+E121",
            'posicion_cuenta' => 'C122', 
            'posicion_formula' => 'E122'
        ]);

        //ratios
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Proporción Sueldos/MOD', 
            'formula' => "=E104/E$107",
            'posicion_cuenta' => 'C130', 
            'posicion_formula' => 'E130'
        ]);
        
        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Proporción Beneficios/MOD', 
            'formula' => "=E105/E$107",
            'posicion_cuenta' => 'C131', 
            'posicion_formula' => 'E131'
        ]);

        $cuentas = Cuentas::create([
            'id_estado_financiero' => '2',
            'name' => 'Proporción Aportes/MOD', 
            'formula' => "=E106/E$107",
            'posicion_cuenta' => 'C132', 
            'posicion_formula' => 'E132'
        ]);
        
        

        ///////////////////////////////////     3        //////////////////////////////////////////

    // Balance General --ESTADOS DE SITUACIÓN FINANCIERA
    //Activos Corrientes

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes', 
        'formula' => "",
        'posicion_cuenta' => 'B146', 
        'posicion_formula' => 'E146'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Caja',
        'formula' => "='BALANCES'!G5",
        'posicion_cuenta' => 'B147', 
        'posicion_formula' => 'E147'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Bancos',
        'formula' => "='BALANCES'!G6+'BALANCES'!G7",
        'posicion_cuenta' => 'B148', 
        'posicion_formula' => 'E148'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Inversiones Temporales',
        'formula' => "='BALANCES'!G22+'BALANCES'!G23+'BALANCES'!G24",
        'posicion_cuenta' => 'B149', 
        'posicion_formula' => 'E149'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Cuentas por Cobrar Clientes',
        'formula' => "",
        'posicion_cuenta' => 'B150', 
        'posicion_formula' => 'E150'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Cuentas por Cobrar Clientes.Ventas Locales',
        'formula' => "='BALANCES'!G10",
        'posicion_cuenta' => 'C151',
        'posicion_formula' => 'E151'
    ]);


    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Cuentas por Cobrar Clientes.Exportaciones',
        'formula' => "='BALANCES'!G11",
        'posicion_cuenta' => 'C152',
        'posicion_formula' => 'E152'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Cuentas por Cobrar Clientes.Relacionados',
        'formula' => "='BALANCES'!G8+'BALANCES'!G9",
        'posicion_cuenta' => 'C153',
        'posicion_formula' => 'E153'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Otras Cuentas por Cobrar',
        'formula' => "",
        'posicion_cuenta' => 'B154', 
        'posicion_formula' => 'E154'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Otras Cuentas por Cobrar.No Relacionados',
        'formula' => "='BALANCES'!G19+'BALANCES'!G20",
        'posicion_cuenta' => 'C155', 
        'posicion_formula' => 'E155'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Otras Cuentas por Cobrar.Relacionados',
        'formula' => "=SUM('BALANCES'!G13:G18)",
        'posicion_cuenta' => 'C156', 
        'posicion_formula' => 'E156'
    ]);


    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Otras Cuentas por Cobrar.Otros',
        'formula' => "='BALANCES'!G25+'BALANCES'!G26",
        'posicion_cuenta' => 'C157', 
        'posicion_formula' => 'E157'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.-Provisión CxC',
        'formula' => "='BALANCES'!G21+'BALANCES'!G12",
        'posicion_cuenta' => 'B158', 
        'posicion_formula' => 'E158'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Inventarios',
        'formula' => "",
        'posicion_cuenta' => 'B159', 
        'posicion_formula' => 'E159'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Inventarios.Materia Prima',
        'formula' => "='BALANCES'!G32+'BALANCES'!G36",
        'posicion_cuenta' => 'C160', 
        'posicion_formula' => 'E160'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Inventarios.Productos Proceso',
        'formula' => "='BALANCES'!G33+'BALANCES'!G37",
        'posicion_cuenta' => 'C161', 
        'posicion_formula' => 'E161'
    ]);


    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Inventarios.Productos Terminados',
        'formula' => "='BALANCES'!G34+'BALANCES'!G38",
        'posicion_cuenta' => 'C162', 
        'posicion_formula' => 'E162'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Inventarios.Mercadería Tránsito',
        'formula' => "='BALANCES'!G31",
        'posicion_cuenta' => 'C163', 
        'posicion_formula' => 'E163'
    ]);



    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Inventarios.Suministros, respuestos y otros',
        'formula' => "='BALANCES'!G35",
        'posicion_cuenta' => 'C164', 
        'posicion_formula' => 'E164'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.-Provisión Inventarios',
        'formula' => "='BALANCES'!G39",
        'posicion_cuenta' => 'B165', 
        'posicion_formula' => 'E165'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Créditos Tributarios',
        'formula' => "=SUM('BALANCES'!G27:G30)",
        'posicion_cuenta' => 'B166', 
        'posicion_formula' => 'E166'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Activos Biológicos',
        'formula' => "=SUM('BALANCES'!G42:G47)",
        'posicion_cuenta' => 'B167', 
        'posicion_formula' => 'E167'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.ANCMV',
        'formula' => "='BALANCES'!G40+'BALANCES'!G41",
        'posicion_cuenta' => 'B168', 
        'posicion_formula' => 'E168'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos Corrientes.Otros Activos',
        'formula' => "=SUM('BALANCES'!G48:G52)",
        'posicion_cuenta' => 'B169', 
        'posicion_formula' => 'E169'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Total Activos Corrientes',
        'formula' => "=SUM(E148:E169)",
        'posicion_cuenta' => 'B170', 
        'posicion_formula' => 'E170'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes', 
        'formula' => "",
        'posicion_cuenta' => 'B172', 
        'posicion_formula' => 'E172'
    ]);






    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.Inversiones financieras LP', 
        'formula' => "=SUM('BALANCES'!G127:G129)",
        'posicion_cuenta' => 'B173', 
        'posicion_formula' => 'E173'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.Inversiones en acciones', 
        'formula' => "=SUM('BALANCES'!G107:G114)",
        'posicion_cuenta' => 'B174', 
        'posicion_formula' => 'E174'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.Terrenos', 
        'formula' => "='BALANCES'!G57+'BALANCES'!G58",
        'posicion_cuenta' => 'B175', 
        'posicion_formula' => 'E175'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.Construcciones en Proceso', 
        'formula' => "='BALANCES'!G67",
        'posicion_cuenta' => 'B176', 
        'posicion_formula' => 'E176'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.PPE depreciable, bruto', 
        'formula' => "=SUM('BALANCES'!G59:G66)+'BALANCES'!G68+'BALANCES'!G69+'BALANCES'!G70+'BALANCES'!G78",
        'posicion_cuenta' => 'B177', 
        'posicion_formula' => 'E177'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.-Depreciación Acumulada', 
        'formula' => "='BALANCES'!G79+'BALANCES'!G80",
        'posicion_cuenta' => 'B178', 
        'posicion_formula' => 'E178'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.-Deterioro Acumulado', 
        'formula' => "='BALANCES'!G81",
        'posicion_cuenta' => 'B179', 
        'posicion_formula' => 'E179'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.PPE depreciable, neto', 
        'formula' => "=E177+E178+E179",
        'posicion_cuenta' => 'B180', 
        'posicion_formula' => 'E180'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.Activos Intangibles', 
        'formula' => "=SUM('BALANCES'!G82:G88)",
        'posicion_cuenta' => 'B181', 
        'posicion_formula' => 'E181'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.Propiedades de Inversión', 
        'formula' => "=SUM('BALANCES'!G89:G94)",
        'posicion_cuenta' => 'B182', 
        'posicion_formula' => 'E182'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.Activos Biológicos', 
        'formula' => "=SUM('BALANCES'!G95:G102)",
        'posicion_cuenta' => 'B183', 
        'posicion_formula' => 'E183'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.Cuentas por Cobrar LP', 
        'formula' => "=SUM('BALANCES'!G115:G126)",
        'posicion_cuenta' => 'B184', 
        'posicion_formula' => 'E184'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.PPE por arrendamiento financiero', 
        'formula' => "=SUM('BALANCES'!G71:G77)",
        'posicion_cuenta' => 'B185', 
        'posicion_formula' => 'E185'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Activos no corrientes.Otros Activos No Corrientes', 
        'formula' => "=SUM('BALANCES'!G103:G106)+SUM('BALANCES'!G130:G136)",
        'posicion_cuenta' => 'B186', 
        'posicion_formula' => 'E186'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Total Activos no corrientes', 
        'formula' => "=SUM(E173:E186)-E180",
        'posicion_cuenta' => 'B187', 
        'posicion_formula' => 'E187'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Total Activos', 
        'formula' => "=E170+E187",
        'posicion_cuenta' => 'B189', 
        'posicion_formula' => 'E189'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo', 
        'formula' => "",
        'posicion_cuenta' => 'B192', 
        'posicion_formula' => 'E192'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Cuentas por Pagar Proveedores', 
        'formula' => "",
        'posicion_cuenta' => 'B193', 
        'posicion_formula' => 'E193'
    ]);


    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Cuentas por Pagar Proveedores.Compras Locales', 
        'formula' => "='BALANCES'!G148",
        'posicion_cuenta' => 'C194', 
        'posicion_formula' => 'E194'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Cuentas por Pagar Proveedores.Importaciones', 
        'formula' => "='BALANCES'!G149",
        'posicion_cuenta' => 'C195', 
        'posicion_formula' => 'E195'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Cuentas por Pagar Proveedores.Relacionados', 
        'formula' => "='BALANCES'!G146+'BALANCES'!G147",
        'posicion_cuenta' => 'C196', 
        'posicion_formula' => 'E196'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Otras Cuentas por Pagar', 
        'formula' => "",
        'posicion_cuenta' => 'B197', 
        'posicion_formula' => 'E197'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Otras Cuentas por Pagar.Anticipos de Clientes', 
        'formula' => "='BALANCES'!G181",
        'posicion_cuenta' => 'C198', 
        'posicion_formula' => 'E198'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Otras Cuentas por Pagar.No Relacionados', 
        'formula' => "='BALANCES'!G156+'BALANCES'!G157",
        'posicion_cuenta' => 'C199', 
        'posicion_formula' => 'E199'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Otras Cuentas por Pagar.Relacionados', 
        'formula' => "=SUM('BALANCES'!G150:G155)",
        'posicion_cuenta' => 'C200', 
        'posicion_formula' => 'E200'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Beneficios Sociales y Aportes IESS', 
        'formula' => "='BALANCES'!G170+'BALANCES'!G171+'BALANCES'!G172",
        'posicion_cuenta' => 'B201', 
        'posicion_formula' => 'E201'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Impuestos Directos (PTU e IR)', 
        'formula' => "='BALANCES'!G168+'BALANCES'!G169",
        'posicion_cuenta' => 'B202', 
        'posicion_formula' => 'E202'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Provisiones', 
        'formula' => "=SUM('BALANCES'!G173:G180)",
        'posicion_cuenta' => 'B203', 
        'posicion_formula' => 'E203'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Otros pasivos Corrientes', 
        'formula' => "='BALANCES'!G166+'BALANCES'!G167+'BALANCES'!G182+'BALANCES'!G183+'BALANCES'!G184+'BALANCES'!G185",
        'posicion_cuenta' => 'B204', 
        'posicion_formula' => 'E204'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivos Corto Plazo.Deudas a Corto Plazo', 
        'formula' => "=SUM('BALANCES'!G158:G162)+'BALANCES'!G164+'BALANCES'!G165",
        'posicion_cuenta' => 'B205', 
        'posicion_formula' => 'E205'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Total Pasivo Corto Plazo', 
        'formula' => "=SUM(E194:E205)",
        'posicion_cuenta' => 'B206', 
        'posicion_formula' => 'E206'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivo Largo Plazo', 
        'formula' => "",
        'posicion_cuenta' => 'B208', 
        'posicion_formula' => 'E208'
    ]);


    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivo Largo Plazo.Obligaciones con Bancos', 
        'formula' => "=SUM('BALANCES'!G200:G204)",
        'posicion_cuenta' => 'B209', 
        'posicion_formula' => 'E209'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivo Largo Plazo.Emisión de Obligaciones', 
        'formula' => "='BALANCES'!G163+'BALANCES'!G205",
        'posicion_cuenta' => 'B210', 
        'posicion_formula' => 'E210'
    ]);



    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivo Largo Plazo.Otros pasivos financieros', 
        'formula' => "='BALANCES'!G206+'BALANCES'!G207",
        'posicion_cuenta' => 'B211', 
        'posicion_formula' => 'E211'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivo Largo Plazo.Préstamos de Accionistas', 
        'formula' => "='BALANCES'!G194+'BALANCES'!G195",
        'posicion_cuenta' => 'B212', 
        'posicion_formula' => 'E212'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivo Largo Plazo.Pasivos Laborales', 
        'formula' => "=SUM('BALANCES'!G210:G212)",
        'posicion_cuenta' => 'B213', 
        'posicion_formula' => 'E213'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Pasivo Largo Plazo.Otros pasivos no corrientes', 
        'formula' => "=SUM('BALANCES'!G190:G193)+SUM('BALANCES'!G196:G199)+'BALANCES'!G208+'BALANCES'!G209+SUM('BALANCES'!G213:G225)",
        'posicion_cuenta' => 'B214', 
        'posicion_formula' => 'E214'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Total Pasivo Largo Plazo', 
        'formula' => "=SUM(E209:E214)",
        'posicion_cuenta' => 'B215', 
        'posicion_formula' => 'E215'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Total Pasivos', 
        'formula' => "=E206+E215",
        'posicion_cuenta' => 'B217', 
        'posicion_formula' => 'E217'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Patrimonio', 
        'formula' => "",
        'posicion_cuenta' => 'B220', 
        'posicion_formula' => 'E220'
    ]);


    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Patrimonio.Capital Social', 
        'formula' => "=SUM('BALANCES'!G235+'BALANCES'!G236)",
        'posicion_cuenta' => 'B221', 
        'posicion_formula' => 'E221'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Patrimonio.Aportes futuras capitalizaciones', 
        'formula' => "='BALANCES'!G237",
        'posicion_cuenta' => 'B222', 
        'posicion_formula' => 'E222'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Patrimonio.Reservas', 
        'formula' => "=SUM('BALANCES'!G238:G244)",
        'posicion_cuenta' => 'B223', 
        'posicion_formula' => 'E223'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Patrimonio.Resultados adopción NIIF', 
        'formula' => "='BALANCES'!G247",
        'posicion_cuenta' => 'B224', 
        'posicion_formula' => 'E224'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Patrimonio.Otro resultado integral', 
        'formula' => "=SUM('BALANCES'!G250:G257)",
        'posicion_cuenta' => 'B225', 
        'posicion_formula' => 'E225'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Patrimonio.Resultados del ejercicio', 
        'formula' => "='BALANCES'!G248+'BALANCES'!G249",
        'posicion_cuenta' => 'B226', 
        'posicion_formula' => 'E226'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Patrimonio.Resultados acumulados', 
        'formula' => "='BALANCES'!G245+'BALANCES'!G246",
        'posicion_cuenta' => 'B227', 
        'posicion_formula' => 'E227'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Total Patrimonio', 
        'formula' => "=SUM(E221:E227)",
        'posicion_cuenta' => 'B228', 
        'posicion_formula' => 'E228'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Total Pasivo y Patrimonio', 
        'formula' => "=E217+E228",
        'posicion_cuenta' => 'B230', 
        'posicion_formula' => 'E230'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Ratios para análisis/proyección', 
        'formula' => "",
        'posicion_cuenta' => 'B233', 
        'posicion_formula' => 'E233'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Ratios para análisis/proyección.Efectivo mínimo en caja', 
        'formula' => "=E147/(E8+E9)",
        'posicion_cuenta' => 'C235', 
        'posicion_formula' => 'E235'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Ratios para análisis/proyección.Proporción de efectivo para bancos', 
        'formula' => "=E148/E$259",
        'posicion_cuenta' => 'C236', 
        'posicion_formula' => 'E236'
    ]);


    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Ratios para análisis/proyección.Proporción de efectivo para inversiones', 
        'formula' => "=E149/E$259",
        'posicion_cuenta' => 'C237', 
        'posicion_formula' => 'E237'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Ratios para análisis/proyección.Proporción de Créditos Tributarios', 
        'formula' => "=E166/(E17+E18+E97+E98)",
        'posicion_cuenta' => 'C242', 
        'posicion_formula' => 'E242'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Ratios para análisis/proyección.Proporción Beneficios y Aportes por pagar', 
        'formula' => "=E201/(E28+E107)",
        'posicion_cuenta' => 'C246', 
        'posicion_formula' => 'E246'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '3',
        'name' => 'Ratios para análisis/proyección.Proporción Jubiliación/Desahucio', 
        'formula' => "=E213/(E28+E107)",
        'posicion_cuenta' => 'C247', 
        'posicion_formula' => 'E247'
    ]);

            ///////////////////////////////////     4       //////////////////////////////////////////

    // 4   Balance General --ESTADOS DE SITUACIÓN FINANCIERA RESUMIDOS

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '4',
        'name' => 'Activos', 
        'formula' => "",
        'posicion_cuenta' => 'B258', 
        'posicion_formula' => 'E258'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '4',
        'name' => 'Activos.Excedentes de Caja', 
        'formula' => "=E148+E149",
        'posicion_cuenta' => 'B259', 
        'posicion_formula' => 'E259'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '4',
        'name' => 'Activos.Activos No corrientes', 
        'formula' => "=E187",
        'posicion_cuenta' => 'B261', 
        'posicion_formula' => 'E261'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '4',
        'name' => 'Total Activos', 
        'formula' => "=SUM(E259:E261)",
        'posicion_cuenta' => 'B262', 
        'posicion_formula' => 'E262'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '4',
        'name' => 'Financiamiento', 
        'formula' => "",
        'posicion_cuenta' => 'B264', 
        'posicion_formula' => 'E264'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '4',
        'name' => 'Financiamiento.Deuda Corto Plazo', 
        'formula' => "=E205",
        'posicion_cuenta' => 'B265', 
        'posicion_formula' => 'E265'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '4',
        'name' => 'Financiamiento.Deuda Largo Plazo', 
        'formula' => "=SUM(E209:E212)",
        'posicion_cuenta' => 'B266', 
        'posicion_formula' => 'E266'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '4',
        'name' => 'Financiamiento.Patrimonio', 
        'formula' => "=E228",
        'posicion_cuenta' => 'B267', 
        'posicion_formula' => 'E267'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '4',
        'name' => 'Total Financiamiento', 
        'formula' => "=SUM(E265:E267)",
        'posicion_cuenta' => 'B268', 
        'posicion_formula' => 'E268'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '4',
        'name' => 'Ratios para análisis/proyección', 
        'formula' => "",
        'posicion_cuenta' => 'B273', 
        'posicion_formula' => 'E273'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '4',
        'name' => 'Ratios para análisis/proyección.Ciclo de Conversión Efectivo', 
        'formula' => "=E133+E134+E135+E238+E239+E241-E243-E244",
        'posicion_cuenta' => 'B276', 
        'posicion_formula' => 'E276'
    ]);

       ///////////////////////////////////     5        //////////////////////////////////////////

      // 5 	Estado Flujo Efectivo --ESTADOS DE FLUJOS DE EFECTIVO PROYECTADOS

      $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN', 
        'formula' => "",
        'posicion_cuenta' => 'B292', 
        'posicion_formula' => 'E292'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Ingresos Operativos', 
        'formula' => "",
        'posicion_cuenta' => 'C293', 
        'posicion_formula' => 'E293'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Ingresos Operativos.Cobros por Ventas y Exportaciones', 
        'formula' => "='FLUJO EFECTIVO'!C7",
        'posicion_cuenta' => 'C294', 
        'posicion_formula' => 'E294'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Ingresos Operativos.Cobros varios', 
        'formula' => "='FLUJO EFECTIVO'!C8+'FLUJO EFECTIVO'!C9+'FLUJO EFECTIVO'!C11",
        'posicion_cuenta' => 'C295', 
        'posicion_formula' => 'E295'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Ingresos Operativos.Cobros por Rendimientos Financieros', 
        'formula' => "='FLUJO EFECTIVO'!C10+'FLUJO EFECTIVO'!C19+'FLUJO EFECTIVO'!C21+'FLUJO EFECTIVO'!C45+'FLUJO EFECTIVO'!C46+'FLUJO EFECTIVO'!C59",
        'posicion_cuenta' => 'C296', 
        'posicion_formula' => 'E296'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Total Ingresos Operativos', 
        'formula' => "=SUM(E294:E296)",
        'posicion_cuenta' => 'C297', 
        'posicion_formula' => 'E297'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Egresos Operativos', 
        'formula' => "",
        'posicion_cuenta' => 'C299', 
        'posicion_formula' => 'E299'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Egresos Operativos.Pagos a proveedores de materias primas y mercaderías', 
        'formula' => "='FLUJO EFECTIVO'!C13",
        'posicion_cuenta' => 'C300', 
        'posicion_formula' => 'E300'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Egresos Operativos.Pagos a empleados por sueldos beneficios aportes', 
        'formula' => "='FLUJO EFECTIVO'!C15",
        'posicion_cuenta' => 'C301', 
        'posicion_formula' => 'E301'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Egresos Operativos.Pagos por costos indirectos fabricación', 
        'formula' => "='FLUJO EFECTIVO'!C15",
        'posicion_cuenta' => 'C302', 
        'posicion_formula' => 'E302'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Egresos Operativos.Pagos por gastos operativos', 
        'formula' => "='FLUJO EFECTIVO'!C14+'FLUJO EFECTIVO'!C16+'FLUJO EFECTIVO'!C17",
        'posicion_cuenta' => 'C303', 
        'posicion_formula' => 'E303'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Egresos Operativos.Pagos por impuestos directos', 
        'formula' => "='FLUJO EFECTIVO'!C22",
        'posicion_cuenta' => 'C304', 
        'posicion_formula' => 'E304'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Egresos Operativos.Pagos varios', 
        'formula' => "='FLUJO EFECTIVO'!C23",
        'posicion_cuenta' => 'C305', 
        'posicion_formula' => 'E305'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE OPERACIÓN.Total Egresos Operativos', 
        'formula' => "=SUM(E300:E304)",
        'posicion_cuenta' => 'C306', 
        'posicion_formula' => 'E306'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'FLUJO DE ACTIVIDADES OPERACIÓN', 
        'formula' => "=E297-E306",
        'posicion_cuenta' => 'B307', 
        'posicion_formula' => 'E307'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE INVERSION', 
        'formula' => "",
        'posicion_cuenta' => 'B309', 
        'posicion_formula' => 'E309'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE INVERSION.Ingresos por venta de activos no corrientes e inversiones', 
        'formula' => "='FLUJO EFECTIVO'!C27+'FLUJO EFECTIVO'!C30+'FLUJO EFECTIVO'!C32+'FLUJO EFECTIVO'!C34+'FLUJO EFECTIVO'!C36+'FLUJO EFECTIVO'!C38+'FLUJO EFECTIVO'!C40+'FLUJO EFECTIVO'!C42+'FLUJO EFECTIVO'!C44",
        'posicion_cuenta' => 'C310', 
        'posicion_formula' => 'E310'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE INVERSION.Egresos por compra de activos no corrientes', 
        'formula' => "='FLUJO EFECTIVO'!C28+'FLUJO EFECTIVO'!C29+'FLUJO EFECTIVO'!C31+'FLUJO EFECTIVO'!C33+'FLUJO EFECTIVO'!C35+'FLUJO EFECTIVO'!C37+'FLUJO EFECTIVO'!C39+'FLUJO EFECTIVO'!C41+'FLUJO EFECTIVO'!C43+'FLUJO EFECTIVO'!C47",
        'posicion_cuenta' => 'C311', 
        'posicion_formula' => 'E311'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'FLUJO DE ACTIVIDADES DE INVERSION', 
        'formula' => "=E310-E311",
        'posicion_cuenta' => 'B312', 
        'posicion_formula' => 'E312'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'FLUJO DE EFECTIVO DEL ACTIVO', 
        'formula' => "=E307+E312",
        'posicion_cuenta' => 'B314', 
        'posicion_formula' => 'E314'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE FINANCIACION', 
        'formula' => "",
        'posicion_cuenta' => 'B316', 
        'posicion_formula' => 'E316'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE FINANCIACION.Deudas Financieras', 
        'formula' => "",
        'posicion_cuenta' => 'C317', 
        'posicion_formula' => 'E317'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE FINANCIACION.Deudas Financieras.Ingresos por contratación deudas', 
        'formula' => "='FLUJO EFECTIVO'!C52+'FLUJO EFECTIVO'!C54+'FLUJO EFECTIVO'!C57",
        'posicion_cuenta' => 'C318', 
        'posicion_formula' => 'E318'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE FINANCIACION.Deudas Financieras.Egresos por amortización deudas', 
        'formula' => "='FLUJO EFECTIVO'!C55+'FLUJO EFECTIVO'!C56",
        'posicion_cuenta' => 'C319', 
        'posicion_formula' => 'E319'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE FINANCIACION.Deudas Financieras.Egresos por pago de intereses', 
        'formula' => "='FLUJO EFECTIVO'!C20",
        'posicion_cuenta' => 'C320', 
        'posicion_formula' => 'E320'
    ]);
    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE FINANCIACION.Total Flujo de Deudas', 
        'formula' => "=E320+E319-E318",
        'posicion_cuenta' => 'C321', 
        'posicion_formula' => 'E321'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE FINANCIACION.Patrimonio', 
        'formula' => "",
        'posicion_cuenta' => 'C323', 
        'posicion_formula' => 'E323'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE FINANCIACION.Patrimonio.Ingresos por aportes de capital', 
        'formula' => "='FLUJO EFECTIVO'!C51",
        'posicion_cuenta' => 'C324', 
        'posicion_formula' => 'E324'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE FINANCIACION.Patrimonio.Egresos por retiros de capital', 
        'formula' => "='FLUJO EFECTIVO'!C53",
        'posicion_cuenta' => 'C325', 
        'posicion_formula' => 'E325'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE FINANCIACION.Patrimonio.Egresos por pagos de dividendos', 
        'formula' => "='FLUJO EFECTIVO'!C58+'FLUJO EFECTIVO'!C18",
        'posicion_cuenta' => 'C326', 
        'posicion_formula' => 'E326'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'ACTIVIDADES DE FINANCIACION.Total Flujo de Patrimonio', 
        'formula' => "=E326+E325-E324",
        'posicion_cuenta' => 'C327', 
        'posicion_formula' => 'E327'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'FLUJO DE ACTIVIDADES DE FINANCIACION', 
        'formula' => "=E321+E327",
        'posicion_cuenta' => 'B329', 
        'posicion_formula' => 'E329'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'Flujo de Efectivo Neto', 
        'formula' => "=E314-E329",
        'posicion_cuenta' => 'B331', 
        'posicion_formula' => 'E331'
    ]);

    $cuentas = Cuentas::create([
        'id_estado_financiero' => '5',
        'name' => 'FLUJO DE EFECTIVO ACUMULADO', 
        'formula' => "",
        'posicion_cuenta' => 'B332', 
        'posicion_formula' => 'E332'
    ]);


    $cuentas = Cuentas::create([
        'id_estado_financiero' => '6',
        'name' => 'Costo de Capital', 
        'formula' => "",
        'posicion_cuenta' => 'C343', 
        'posicion_formula' => 'E343'
    ]);


    $cuentas = Cuentas::create([
        'id_estado_financiero' => '6',
        'name' => 'Costo de Capital.[Opción escogida por el usuario]', 
        'formula' => "[Porcentaje que le corresponde en BETAS]",
        'posicion_cuenta' => 'C344', 
        'posicion_formula' => 'E344'
    ]);

    


    }
}
