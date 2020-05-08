<?php

use Illuminate\Database\Seeder;
use App\EstadosResultadosIntegrales;
class EResultadosIntegralesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // factory(App\EstadosResultadosIntegrales::class, 10)->create();

 //GASTOS GENERALES
 $estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Ingresos.Ventas Nacionales', 
    'periodo1' => "='RESULTADOS'!K4+'RESULTADOS'!K5++'RESULTADOS'!K6+'RESULTADOS'!K7+'RESULTADOS'!K10", 
    'periodo2' => "='RESULTADOS'!L4+'RESULTADOS'!L5++'RESULTADOS'!L6+'RESULTADOS'!L7+'RESULTADOS'!L10", 
    'periodo3' => "='RESULTADOS'!M4+'RESULTADOS'!M5++'RESULTADOS'!M6+'RESULTADOS'!M7+'RESULTADOS'!M10", 
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Ingresos.Expotaciones', 
    'periodo1' => "='RESULTADOS'!K8+'RESULTADOS'!K9", 
    'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
    'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Ingresos.Otros Ingresos', 
    'periodo1' => "=SUM('RESULTADOS'!K11:K58)+'RESULTADOS'!K67+'RESULTADOS'!K68+'RESULTADOS'!K69+'RESULTADOS'!K70+'RESULTADOS'!K71", 
    'periodo2' => "=SUM('RESULTADOS'!L11:L58)+'RESULTADOS'!L67+'RESULTADOS'!L68+'RESULTADOS'!L69+'RESULTADOS'!L70+'RESULTADOS'!L71", 
    'periodo3' => "=SUM('RESULTADOS'!M11:M58)+'RESULTADOS'!M67+'RESULTADOS'!M68+'RESULTADOS'!M69+'RESULTADOS'!M70+'RESULTADOS'!M71", 
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Ingresos.Rendimientos Financieros', 
    'periodo1' => "=SUM('RESULTADOS'!K59:K66)", 
    'periodo2' => "=SUM('RESULTADOS'!L59:L66)", 
    'periodo3' => "=SUM('RESULTADOS'!M59:M66)", 
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Costo de Ventas.Inventario Inicial', 
    'periodo1' => "='RESULTADOS'!K77", 
    'periodo2' => "='RESULTADOS'!L77", 
    'periodo3' => "='RESULTADOS'!M77", 
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Costo de Ventas.Compras e Importaciones de Mercaderías', 
    'periodo1' => "='RESULTADOS'!K78+'RESULTADOS'!K79", 
    'periodo2' => "='RESULTADOS'!L78+'RESULTADOS'!L79", 
    'periodo3' => "='RESULTADOS'!M78+'RESULTADOS'!M79", 
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Costo de Ventas.Inventario Final', 
    'periodo1' => "='RESULTADOS'!K80", 
    'periodo2' => "='RESULTADOS'!L80", 
    'periodo3' => "='RESULTADOS'!M80", 
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.Sueldos, Beneficios y Aportes', 
    'periodo1' => "='RESULTADOS'!K147+'RESULTADOS'!K148+'RESULTADOS'!K149+'RESULTADOS'!K152+'RESULTADOS'!K153", 
    'periodo2' => "='RESULTADOS'!L147+'RESULTADOS'!L148+'RESULTADOS'!L149+'RESULTADOS'!L152+'RESULTADOS'!L153", 
    'periodo3' => "='RESULTADOS'!M147+'RESULTADOS'!M148+'RESULTADOS'!M149+'RESULTADOS'!M152+'RESULTADOS'!M153", 
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.Honorarios Profesionales', 
    'periodo1' => "='RESULTADOS'!K150+'RESULTADOS'!K151+'RESULTADOS'!K154", 
    'periodo2' => "='RESULTADOS'!L150+'RESULTADOS'!L151+'RESULTADOS'!L154", 
    'periodo3' => "='RESULTADOS'!M150+'RESULTADOS'!M151+'RESULTADOS'!M154", 
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.promoción y publicidad', 
    'periodo1' => "='RESULTADOS'!K191", 
    'periodo2' => "='RESULTADOS'!L191", 
    'periodo3' => "='RESULTADOS'!M191", 
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.transporte', 
    'periodo1' => "='RESULTADOS'!K192", 
    'periodo2' => "='RESULTADOS'!L192", 
    'periodo3' => "='RESULTADOS'!M192",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.consumo de combustibles y lubricantes', 
    'periodo1' => "='RESULTADOS'!K193", 
    'periodo2' => "='RESULTADOS'!L193", 
    'periodo3' => "='RESULTADOS'!M193",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.gastos de viaje', 
    'periodo1' => "='RESULTADOS'!K194", 
    'periodo2' => "='RESULTADOS'!L194", 
    'periodo3' => "='RESULTADOS'!M194",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.gastos de gestión', 
    'periodo1' => "='RESULTADOS'!K195", 
    'periodo2' => "='RESULTADOS'!L195", 
    'periodo3' => "='RESULTADOS'!M195",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.arrendamientos operativos', 
    'periodo1' => "='RESULTADOS'!K196", 
    'periodo2' => "='RESULTADOS'!L196", 
    'periodo3' => "='RESULTADOS'!M196",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.suministros, herramientas, materiales y repuestos', 
    'periodo1' => "='RESULTADOS'!K197", 
    'periodo2' => "='RESULTADOS'!L197", 
    'periodo3' => "='RESULTADOS'!M197",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.mantenimiento y reparaciones',
    'periodo1' => "='RESULTADOS'!K199",
    'periodo2' => "='RESULTADOS'!L199",
    'periodo3' => "='RESULTADOS'!M199",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.mermas',
    'periodo1' => "='RESULTADOS'!K200",
    'periodo2' => "='RESULTADOS'!L200",
    'periodo3' => "='RESULTADOS'!M200",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.seguros y reaseguros (primas y cesiones)',
    'periodo1' => "='RESULTADOS'!K201",
    'periodo2' => "='RESULTADOS'!L201",
    'periodo3' => "='RESULTADOS'!M201",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.gastos indirectos asignados desde el exterior por partes relacionadas',
    'periodo1' => "='RESULTADOS'!K202",
    'periodo2' => "='RESULTADOS'!L202",
    'periodo3' => "='RESULTADOS'!M202",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.impuestos, contribuciones y otros',
    'periodo1' => "='RESULTADOS'!K203",
    'periodo2' => "='RESULTADOS'!L203",
    'periodo3' => "='RESULTADOS'!M203",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.comisiones y similares',
    'periodo1' => "=SUM('RESULTADOS'!K204:K207)",
    'periodo2' => "=SUM('RESULTADOS'!L204:L207)",
    'periodo3' => "=SUM('RESULTADOS'!M204:M207)",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.regalias, servicios técnicos, consultorias',
    'periodo1' => "=SUM('RESULTADOS'!K208:K211)",
    'periodo2' => "=SUM('RESULTADOS'!L208:L211)",
    'periodo3' => "=SUM('RESULTADOS'!M208:M211)",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.instalación, organización y similares',
    'periodo1' => "='RESULTADOS'!K212",
    'periodo2' => "='RESULTADOS'!L212",
    'periodo3' => "='RESULTADOS'!M212",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.iva que se carga al costo o gasto',
    'periodo1' => "='RESULTADOS'!K213",
    'periodo2' => "='RESULTADOS'!L213",
    'periodo3' => "='RESULTADOS'!M213",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.servicios públicos',
    'periodo1' => "='RESULTADOS'!K214",
    'periodo2' => "='RESULTADOS'!L214",
    'periodo3' => "='RESULTADOS'!M214",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.pérdidas por siniestros',
    'periodo1' => "='RESULTADOS'!K215",
    'periodo2' => "='RESULTADOS'!L215",
    'periodo3' => "='RESULTADOS'!M215",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Generales.otros',
    'periodo1' => "='RESULTADOS'!K216",
    'periodo2' => "='RESULTADOS'!L216",
    'periodo3' => "='RESULTADOS'!M216",
]);

    // Gastos no efectivos

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos no efectivos.Provisiones créditos incobrables',
    'periodo1' => "='RESULTADOS'!K171",
    'periodo2' => "='RESULTADOS'!L171",
    'periodo3' => "='RESULTADOS'!M171",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos no efectivos.Depreciaciones',
    'periodo1' => "=SUM('RESULTADOS'!K155:K164)",
    'periodo2' => "=SUM('RESULTADOS'!L155:L164)",
    'periodo3' => "=SUM('RESULTADOS'!M155:M164)",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos no efectivos.Amortizaciones',
    'periodo1' => "=SUM('RESULTADOS'!K165:K170)",
    'periodo2' => "=SUM('RESULTADOS'!L165:L170)",
    'periodo3' => "=SUM('RESULTADOS'!M165:M170)",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos no efectivos.Deterioro',
    'periodo1' => "=SUM('RESULTADOS'!K172:K180)",
    'periodo2' => "=SUM('RESULTADOS'!L172:L180)",
    'periodo3' => "=SUM('RESULTADOS'!M172:M180)",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos no efectivos.Provisiones varias',
    'periodo1' => "=SUM('RESULTADOS'!K181:K190)",
    'periodo2' => "=SUM('RESULTADOS'!L181:L190)",
    'periodo3' => "=SUM('RESULTADOS'!M181:M190)",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos no efectivos.Pérdida en enajenación de acciones y otros',
    'periodo1' => "='RESULTADOS'!K198",
    'periodo2' => "='RESULTADOS'!L198",
    'periodo3' => "='RESULTADOS'!M198",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos no efectivos.Otros',
    'periodo1' => "='RESULTADOS'!K233+'RESULTADOS'!K234+'RESULTADOS'!K235+'RESULTADOS'!K236+'RESULTADOS'!K237+'RESULTADOS'!K238",
    'periodo2' => "='RESULTADOS'!L233+'RESULTADOS'!L234+'RESULTADOS'!L235+'RESULTADOS'!L236+'RESULTADOS'!L237+'RESULTADOS'!L238",
    'periodo3' => "='RESULTADOS'!M233+'RESULTADOS'!M234+'RESULTADOS'!M235+'RESULTADOS'!M236+'RESULTADOS'!M237+'RESULTADOS'!M238",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Gastos Financieros',
    'periodo1' => "=SUM('RESULTADOS'!K217:K232)",
    'periodo2' => "=SUM('RESULTADOS'!L217:L232)",
    'periodo3' => "=SUM('RESULTADOS'!M217:M232)",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Impuestos',
    'periodo1' => "='RESULTADOS'!K244+'RESULTADOS'!K246",
    'periodo2' => "='RESULTADOS'!L244+'RESULTADOS'!L246",
    'periodo3' => "='RESULTADOS'!M244+'RESULTADOS'!M246",
]);

$estadosResultadosIntegrales = EstadosResultadosIntegrales::create([
    'idconsultoria' => '1',
    'name' => 'Dividendos Declarados',
    'periodo1' => "='RESULTADOS'!K244+'RESULTADOS'!K246",
    'periodo2' => "='RESULTADOS'!L244+'RESULTADOS'!L246",
    'periodo3' => "='RESULTADOS'!M244+'RESULTADOS'!M246",
]);


    

    
    

    




    }
}
