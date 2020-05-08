<?php

use Illuminate\Database\Seeder;
use App\EstadosSituacionFinanciera;
class ESituacionFinancieraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\EstadosSituacionFinanciera::class, 10)->create();


    //Activos Corrientes
    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Efectivo', 
        'periodo1' => "='BALANCES'!J5",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Inversiones Temporales', 
        'periodo1' => "='BALANCES'!J20+'BALANCES'!J21+'BALANCES'!J22", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Cuentas por Cobrar Clientes.Ventas Locales', 
        'periodo1' => "='BALANCES'!J8", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);


    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Cuentas por Cobrar Clientes.Exportaciones', 
        'periodo1' => "='BALANCES'!J9", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Cuentas por Cobrar Clientes.Relacionados', 
        'periodo1' => "='BALANCES'!J6+'BALANCES'!J7", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);


    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Otras Cuentas por Cobrar.No Relacionados', 
        'periodo1' => "='BALANCES'!J17+'BALANCES'!J18", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Otras Cuentas por Cobrar.Relacionados', 
        'periodo1' => "=SUM('BALANCES'!J11:J16)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);


    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Otras Cuentas por Cobrar.Otros', 
        'periodo1' => "='BALANCES'!J23+'BALANCES'!J24", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Otras Cuentas por Cobrar.-Provisión CxC', 
        'periodo1' => "='BALANCES'!J19+'BALANCES'!J10", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);


    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Inventarios.Materia Prima', 
        'periodo1' => "='BALANCES'!J30+'BALANCES'!J34", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);
    
    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Inventarios.Productos Proceso', 
        'periodo1' => "='BALANCES'!J31+'BALANCES'!J35", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);


    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Inventarios.Productos Terminados', 
        'periodo1' => "='BALANCES'!J32+'BALANCES'!J36", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Inventarios.Mercadería Tránsito', 
        'periodo1' => "='BALANCES'!J29", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);



    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Inventarios.Suministros, respuestos y otros', 
        'periodo1' => "='BALANCES'!J33", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);


    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Inventarios.-Provisión Inventarios', 
        'periodo1' => "='BALANCES'!J37", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Inventarios.Créditos Tributarios', 
        'periodo1' => "=SUM('BALANCES'!J25:J28)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Inventarios.Activos Biológicos', 
        'periodo1' => "=SUM('BALANCES'!J40:J45)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Inventarios.ANCMV', 
        'periodo1' => "='BALANCES'!J38+'BALANCES'!J39", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);
    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos Corrientes.Inventarios.Otros Activos', 
        'periodo1' => "=SUM('BALANCES'!J46:J50)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);





    //Activos no corrientes
    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.Inversiones financieras LP', 
        'periodo1' => "=SUM('BALANCES'!J125:J127)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.Inversiones en acciones', 
        'periodo1' => "=SUM('BALANCES'!J105:J112)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([//ACTUALIZAR
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.Terrenos', 
        'periodo1' => "='BALANCES'!J55+'BALANCES'!J56", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.Construcciones en Proceso', 
        'periodo1' => "='BALANCES'!J65", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.PPE depreciable, bruto', 
        'periodo1' => "=SUM('BALANCES'!J57:J64)+'BALANCES'!J66+'BALANCES'!J67+'BALANCES'!J68+'BALANCES'!J76",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.-Depreciación Acumulada', 
        'periodo1' => "='BALANCES'!J77+'BALANCES'!J78", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.-Deterioro Acumulado', 
        'periodo1' => "=E169+E170+E171", //JNI CAMBIO
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.PPE depreciable, neto', 
        'periodo1' => "=E169+E170+E171", //JNI CAMBIO
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.Activos Intangibles', 
        'periodo1' => "=SUM('BALANCES'!J80:J86)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.Propiedades de Inversión', 
        'periodo1' => "=SUM('BALANCES'!J87:J92)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.Activos Biológicos', 
        'periodo1' => "=SUM('BALANCES'!J93:J100)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.Cuentas por Cobrar LP', 
        'periodo1' => "=SUM('BALANCES'!J113:J124)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.PPE por arrendamiento financiero', 
        'periodo1' => "=SUM('BALANCES'!J69:J75)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Activos no corrientes.Otros Activos No Corrientes', 
        'periodo1' => "=SUM('BALANCES'!J101:J104)+SUM('BALANCES'!J128:J134)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    //Pasivos Corto Plazo
    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivos Corto Plazo.Cuentas por Pagar Proveedores.Compras Locales', 
        'periodo1' => "='BALANCES'!J146", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivos Corto Plazo.Cuentas por Pagar Proveedores.Importaciones', 
        'periodo1' => "='BALANCES'!J147", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);
    
    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivos Corto Plazo.Cuentas por Pagar Proveedores.Relacionados',
        'periodo1' => "='BALANCES'!J144+'BALANCES'!J145", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivos Corto Plazo.Otras Cuentas por Pagar.Anticipos de Clientes',
        'periodo1' => "='BALANCES'!J179",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivos Corto Plazo.Otras Cuentas por Pagar.No Relacionados',
        'periodo1' => "='BALANCES'!J154+'BALANCES'!J155", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivos Corto Plazo.Otras Cuentas por Pagar.Relacionados',
        'periodo1' => "=SUM('BALANCES'!J148:J153)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivos Corto Plazo.Beneficios Sociales y Aportes IESS',
        'periodo1' => "='BALANCES'!J168+'BALANCES'!J169+'BALANCES'!J170", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivos Corto Plazo.Impuestos Directos (PTU e IR)',
        'periodo1' => "='BALANCES'!J166+'BALANCES'!J167", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivos Corto Plazo.Provisiones',
        'periodo1' => "=SUM('BALANCES'!J171:J178)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);
    
    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivos Corto Plazo.Otros pasivos Corrientes',
        'periodo1' => "='BALANCES'!J164+'BALANCES'!J165+'BALANCES'!J180+'BALANCES'!J181+'BALANCES'!J182+'BALANCES'!J183", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);
    
    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivos Corto Plazo.Deudas a Corto Plazo',
        'periodo1' => "=SUM('BALANCES'!J156:J160)+'BALANCES'!J162+'BALANCES'!J163",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    //Pasivo Largo Plazo
    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivo Largo Plazo.Obligaciones con Bancos',
        'periodo1' => "=SUM('BALANCES'!J198:J202)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivo Largo Plazo.Emisión de Obligaciones',
        'periodo1' => "='BALANCES'!J161+'BALANCES'!J203", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

        // Gastos no efectivos
    
    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivo Largo Plazo.Otros pasivos financieros',
        'periodo1' => "='BALANCES'!J204+'BALANCES'!J205", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivo Largo Plazo.Préstamos de Accionistas',
        'periodo1' => "='BALANCES'!J192+'BALANCES'!J193", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivo Largo Plazo.Pasivos Laborales',
        'periodo1' => "=SUM('BALANCES'!J208:J210)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Pasivo Largo Plazo.Otros pasivos no corrientes',
        'periodo1' => "=SUM('BALANCES'!J188:J191)+SUM('BALANCES'!J194:J197)+'BALANCES'!J206+'BALANCES'!J207+SUM('BALANCES'!J211:J223)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    //Patrimonio
    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Patrimonio.Capital Social',
        'periodo1' => "=SUM('BALANCES'!J233:J234)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Patrimonio.Aportes futuras capitalizaciones',
        'periodo1' => "='BALANCES'!J235", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Patrimonio.Reservas',
        'periodo1' => "=SUM('BALANCES'!J236:J242)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Patrimonio.Resultados adopción NIIF',
        'periodo1' => "='BALANCES'!J245", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Patrimonio.Otro resultado integral',
        'periodo1' => "=SUM('BALANCES'!J248:J255)",
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Patrimonio.Resultados del ejercicio',
        'periodo1' => "='BALANCES'!J246+'BALANCES'!J247", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);
    

    $estadosSituacionFinanciera = EstadosSituacionFinanciera::create([
        'idconsultoria' => '1',
        'name' => 'Patrimonio.Resultados acumulados',
        'periodo1' => "='BALANCES'!J243+'BALANCES'!J244", 
        'periodo2' => "='RESULTADOS'!L8+'RESULTADOS'!L9", 
        'periodo3' => "='RESULTADOS'!M8+'RESULTADOS'!M9", 
    ]);
        
    }
}
