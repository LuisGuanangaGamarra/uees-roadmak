<?php

use Illuminate\Database\Seeder;
use App\Balance;
class BalanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {//factory(App\Balance::class, 10)->create();

        /*****************************************************ACTIVO CORRIENTE**************************************************************************************************** */
        $balance = Balance::create([
            'name' => 'EFECTIVO Y EQUIVALENTES AL EFECTIVO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES CORRIENTES.RELACIONADAS.LOCALES',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);


        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES CORRIENTES.RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES CORRIENTES.NO RELACIONADAS.LOCALES',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);


        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES CORRIENTES.NO RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES CORRIENTES.(-) DETERIORO ACUMULADO DEL VALOR DE CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES POR INCOBRABILIDAD (PROVISIONES PARA CRÉDITOS INCOBRABLES)',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.A ACCIONISTAS, SOCIOS, PARTÍCIPES, BENEFICIARIOS U OTROS TITULARES DE DERECHOS REPRESENTATIVOS DE CAPITAL.LOCALES',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.A ACCIONISTAS, SOCIOS, PARTÍCIPES, BENEFICIARIOS U OTROS TITULARES DE DERECHOS REPRESENTATIVOS DE CAPITAL.DEL EXTERIOR',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.DIVIDENDOS POR COBRAR.EN EFECTIVO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.DIVIDENDOS POR COBRAR.EN ACTIVOS DIFERENTES DEL EFECTIVO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS RELACIONADAS.LOCALES',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS NO RELACIONADAS.LOCALES',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS NO RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);


        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR CORRIENTES.(-) DETERIORO ACUMULADO DEL VALOR DE OTRAS CUENTAS Y DOCUMENTOS POR COBRAR POR INCOBRABILIDAD (PROVISIONES PARA CRÉDITOS INCOBRABLES)',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'OTROS ACTIVOS FINANCIEROS CORRIENTES.A COSTO AMORTIZADO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);


        $balance = Balance::create([
            'name' => 'OTROS ACTIVOS FINANCIEROS CORRIENTES.(-) DETERIORO ACUMULADO DEL VALOR  DE OTROS ACTIVOS FINANCIEROS CORRIENTES MEDIDOS A COSTO AMORTIZADO  (PROVISIONES PARA CRÉDITOS INCOBRABLES)',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'OTROS ACTIVOS FINANCIEROS CORRIENTES.A VALOR RAZONABLE',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        
        $balance = Balance::create([
            'name' => 'PORCIÓN CORRIENTE DE ARRENDAMIENTOS FINANCIEROS POR COBRAR',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'IMPORTE BRUTO ADEUDADO POR LOS CLIENTES POR EL TRABAJO EJECUTADO EN CONTRATOS DE CONSTRUCCIÓN',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS POR IMPUESTOS CORRIENTES.CRÉDITO TRIBUTARIO A FAVOR DEL SUJETO PASIVO (ISD)',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        
        $balance = Balance::create([
            'name' => 'ACTIVOS POR IMPUESTOS CORRIENTES.CRÉDITO TRIBUTARIO A FAVOR DEL SUJETO PASIVO (IVA)',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS POR IMPUESTOS CORRIENTES.CRÉDITO TRIBUTARIO A FAVOR DEL SUJETO PASIVO (IMPUESTO A LA RENTA)',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS POR IMPUESTOS CORRIENTES.OTROS',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'INVENTARIOS.MERCADERÍAS EN TRÁNSITO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVENTARIOS.INVENTARIO DE MATERIA PRIMA (NO PARA LA CONSTRUCCIÓN)',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVENTARIOS.INVENTARIO DE PRODUCTOS EN PROCESO (EXCLUYENDO OBRAS/INMUEBLES EN CONSTRUCCIÓN PARA LA VENTA)',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVENTARIOS.INVENTARIO DE PROD. TERM. Y MERCAD. EN ALMACÉN (EXCLUYENDO OBRAS/INMUEBLES  TERMINADOS PARA LA VENTA)',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVENTARIOS.INVENTARIO DE SUMINISTROS, HERRAMIENTAS, REPUESTOS Y MATERIALES (NO PARA LA CONSTRUCCIÓN)',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVENTARIOS.INVENTARIO DE MATERIA PRIMA, SUMINISTROS Y MATERIALES PARA LA CONSTRUCCIÓN',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'INVENTARIOS.INVENTARIO DE OBRAS/INMUEBLES EN CONSTRUCCIÓN PARA LA VENTA',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVENTARIOS.INVENTARIO DE OBRAS/INMUEBLES TERMINADOS PARA LA VENTA',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVENTARIOS.(-) DETERIORO ACUMULADO DEL VALOR DE INVENTARIOS POR AJUSTE AL VALOR NETO REALIZABLE',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'ACTIVOS NO CORRIENTES MANTENIDOS PARA LA VENTA.COSTO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS NO CORRIENTES MANTENIDOS PARA LA VENTA.(-) DETERIORO ACUMULADO DEL VALOR DE ACTIVOS NO CORRIENTES MANTENIDOS PARA LA VENTA',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.PLANTAS VIVAS Y FRUTOS EN CRECIMIENTO.A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.PLANTAS VIVAS Y FRUTOS EN CRECIMIENTO.(-) DETERIORO ACUMULADO DEL VALOR DE ACTIVOS BIOLÓGICOS MEDIDOS A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.PLANTAS VIVAS Y FRUTOS EN CRECIMIENTO.A VALOR RAZONABLE MENOS LOS COSTOS DE VENTA',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.ANIMALES VIVOS.A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.ANIMALES VIVOS.(-) DETERIORO ACUMULADO DEL VALOR DE ACTIVOS BIOLÓGICOS MEDIDOS A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.ANIMALES VIVOS.A VALOR RAZONABLE MENOS LOS COSTOS DE VENTA',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'GASTOS PAGADOS POR ANTICIPADO (PREPAGADOS).PROPAGANDA Y PUBLICIDAD PREPAGADA',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'GASTOS PAGADOS POR ANTICIPADO (PREPAGADOS).ARRENDAMIENTOS OPERATIVOS PAGADOS POR ANTICIPADO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'GASTOS PAGADOS POR ANTICIPADO (PREPAGADOS).PRIMAS DE SEGURO PAGADAS POR ANTICIPADO',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);
        $balance = Balance::create([
            'name' => 'GASTOS PAGADOS POR ANTICIPADO (PREPAGADOS).OTROS',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

        $balance = Balance::create([
            'name' => 'OTROS ACTIVOS CORRIENTES',
            'type_1' => 'AT', 
            'type_2' => 'AC', 
        ]);

/*****************************************************ACTIVO NO CORRIENTE**************************************************************************************************** */

        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.TERRENOS.COSTO HISTÓRICO ANTES DE REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.TERRENOS.AJUSTE ACUMULADO POR REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.EDIFICIOS Y OTROS INMUEBLES (EXCEPTO TERRENOS).COSTO HISTÓRICO ANTES DE REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.EDIFICIOS Y OTROS INMUEBLES (EXCEPTO TERRENOS).AJUSTE ACUMULADO POR REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.NAVES, AERONAVES, BARCAZAS Y SIMILARES.COSTO HISTÓRICO ANTES DE REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.NAVES, AERONAVES, BARCAZAS Y SIMILARES.AJUSTE ACUMULADO POR REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);


        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.MAQUINARIA, EQUIPO,  INSTALACIONES y ADECUACIONES.COSTO HISTÓRICO ANTES DE REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
       
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.MAQUINARIA, EQUIPO,  INSTALACIONES y ADECUACIONES.AJUSTE ACUMULADO POR REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.PLANTAS PRODUCTORAS (AGRICULTURA).COSTO HISTÓRICO ANTES DE REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.PLANTAS PRODUCTORAS (AGRICULTURA).AJUSTE ACUMULADO POR REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.CONSTRUCCIONES EN CURSO Y OTROS ACTIVOS EN TRÁNSITO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.MUEBLES Y ENSERES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.EQUIPO DE COMPUTACIÓN',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.VEHÍCULOS, EQUIPO DE TRANSPORTE Y CAMINERO MÓVIL',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.PROPIEDADES, PLANTA Y EQUIPO POR CONTRATOS DE ARRENDAMIENTO FINANCIERO.TERRENOS',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.PROPIEDADES, PLANTA Y EQUIPO POR CONTRATOS DE ARRENDAMIENTO FINANCIERO.EDIFICIOS Y OTROS INMUEBLES (EXCEPTO TERRENOS)',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.PROPIEDADES, PLANTA Y EQUIPO POR CONTRATOS DE ARRENDAMIENTO FINANCIERO.NAVES, AERONAVES, BARCAZAS Y SIMILARES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.PROPIEDADES, PLANTA Y EQUIPO POR CONTRATOS DE ARRENDAMIENTO FINANCIERO.MAQUINARIA, EQUIPO, INSTALACIONES Y ADECUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.PROPIEDADES, PLANTA Y EQUIPO POR CONTRATOS DE ARRENDAMIENTO FINANCIERO.EQUIPO DE COMPUTACIÓN',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.PROPIEDADES, PLANTA Y EQUIPO POR CONTRATOS DE ARRENDAMIENTO FINANCIERO.VEHÍCULOS, EQUIPO DE TRANSPORTE Y CAMINERO MÓVIL',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.PROPIEDADES, PLANTA Y EQUIPO POR CONTRATOS DE ARRENDAMIENTO FINANCIERO.OTROS',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.OTRAS PROPIEDADES, PLANTA Y EQUIPO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.(-) DEPRECIACIÓN ACUMULADA DE PROPIEDADES, PLANTA Y EQUIPO.DEL COSTO HISTÓRICO ANTES DE REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.(-) DEPRECIACIÓN ACUMULADA DE PROPIEDADES, PLANTA Y EQUIPO.DEL AJUSTE ACUMULADO POR REEXPRESIONES O REVALUACIONES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES, PLANTA Y EQUIPO.(-) DETERIORO ACUMULADO DEL VALOR DE PROPIEDADES, PLANTA Y EQUIPO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS INTANGIBLES.PLUSVALÍA O GOODWILL (DERECHO DE LLAVE)',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'ACTIVOS INTANGIBLES.MARCAS, PATENTES, LICENCIAS Y OTROS SIMILARES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);


        $balance = Balance::create([
            'name' => 'ACTIVOS INTANGIBLES.ADECUACIONES Y MEJORAS EN BIENES ARRENDADOS MEDIANTE ARRENDAMIENTO OPERATIVO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'ACTIVOS INTANGIBLES.OTROS',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS INTANGIBLES.(-) AMORTIZACIÓN ACUMULADA DE ACTIVOS INTANGIBLES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES DE INVERSIÓN.TERRENOS.A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES DE INVERSIÓN.TERRENOS.A VALOR RAZONABLE',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES DE INVERSIÓN.EDIFICIOS.A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES DE INVERSIÓN.EDIFICIOS.A VALOR RAZONABLE',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROPIEDADES DE INVERSIÓN.(-) DEPRECIACIÓN ACUMULADA DE PROPIEDADES DE INVERSIÓN',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROPIEDADES DE INVERSIÓN.(-) DETERIORO ACUMULADO DEL VALOR DE PROPIEDADES DE INVERSIÓN',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
                
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.PLANTAS VIVAS Y FRUTOS EN CRECIMIENTO.A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.PLANTAS VIVAS Y FRUTOS EN CRECIMIENTO.(-) DEPRECIACIÓN ACUMULADA DE ACTIVOS BIOLÓGICOS MEDIDOS A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.PLANTAS VIVAS Y FRUTOS EN CRECIMIENTO.(-) DETERIORO ACUMULADO DEL VALOR DE ACTIVOS BIOLÓGICOS MEDIDOS A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.PLANTAS VIVAS Y FRUTOS EN CRECIMIENTO.A VALOR RAZONABLE MENOS LOS COSTOS DE VENTA',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.ANIMALES VIVOS.A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.ANIMALES VIVOS.(-) DEPRECIACIÓN ACUMULADA DE ACTIVOS BIOLÓGICOS MEDIDOS A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.ANIMALES VIVOS.(-) DETERIORO ACUMULADO DEL VALOR DE ACTIVOS BIOLÓGICOS MEDIDOS A COSTO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS BIOLÓGICOS.ANIMALES VIVOS.A VALOR RAZONABLE MENOS LOS COSTOS DE VENTA',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'ACTIVOS PARA EXPLORACIÓN Y EVALUACIÓN DE RECURSOS MINERALES.TANGIBLES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS PARA EXPLORACIÓN Y EVALUACIÓN DE RECURSOS MINERALES.INTANGIBLES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS PARA EXPLORACIÓN Y EVALUACIÓN DE RECURSOS MINERALES.(-) DEPRECIACIÓN / AMORTIZACIÓN ACUMULADA DE ACTIVOS PARA EXPLORACIÓN Y EVALUACIÓN',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS PARA EXPLORACIÓN Y EVALUACIÓN DE RECURSOS MINERALES.(-) DETERIORO ACUMULADO DEL VALOR DE ACTIVOS PARA EXPLORACIÓN Y EVALUACIÓN',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'INVERSIONES   NO CORRIENTES.EN SUBSIDIARIAS.COSTO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVERSIONES   NO CORRIENTES.EN SUBSIDIARIAS.AJUSTE ACUMULADO POR APLICACIÓN DEL MÉTODO DE LA PARTICIPACIÓN (VALOR PATRIMONIAL PROPORCIONAL)',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVERSIONES   NO CORRIENTES.EN ASOCIADAS.COSTO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVERSIONES   NO CORRIENTES.EN ASOCIADAS.AJUSTE ACUMULADO POR APLICACIÓN DEL MÉTODO DE LA PARTICIPACIÓN (VALOR PATRIMONIAL PROPORCIONAL)',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVERSIONES   NO CORRIENTES.EN NEGOCIOS CONJUNTOS.COSTO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVERSIONES   NO CORRIENTES.EN NEGOCIOS CONJUNTOS.AJUSTE ACUMULADO POR APLICACIÓN DEL MÉTODO DE LA PARTICIPACIÓN (VALOR PATRIMONIAL PROPORCIONAL)',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVERSIONES   NO CORRIENTES.OTROS DERECHOS REPRESENTATIVOS DE CAPITAL  EN  SOCIEDADES QUE NO SON SUBSIDIARIAS, NI ASOCIADAS, NI NEGOCIOS CONJUNTOS',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'INVERSIONES   NO CORRIENTES.(-) DETERIORO ACUMULADO DEL VALOR DE INVERSIONES NO CORRIENTES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES NO CORRIENTES.RELACIONADAS.LOCALES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES NO CORRIENTES.RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES NO CORRIENTES.NO RELACIONADAS.LOCALES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES NO CORRIENTES.NO RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES NO CORRIENTES.(-) DETERIORO ACUMULADO DEL VALOR DE CUENTAS Y DOCUMENTOS POR COBRAR COMERCIALES POR INCOBRABILIDAD (PROVISIONES PARA CRÉDITOS INCOBRABLES)',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.A ACCIONISTAS, SOCIOS, PARTÍCIPES, BENEFICIARIOS U OTROS TITULARES DE DERECHOS REPRESENTATIVOS DE CAPITAL.LOCALES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.A ACCIONISTAS, SOCIOS, PARTÍCIPES, BENEFICIARIOS U OTROS TITULARES DE DERECHOS REPRESENTATIVOS DE CAPITAL.DEL EXTERIOR',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.OTRAS RELACIONADAS.LOCALES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.OTRAS RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.OTRAS NO RELACIONADAS.LOCALES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.OTRAS NO RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR COBRAR NO CORRIENTES.(-) DETERIORO ACUMULADO DEL VALOR DE OTRAS CUENTAS Y DOCUMENTOS POR COBRAR POR INCOBRABILIDAD (PROVISIONES PARA CRÉDITOS INCOBRABLES)',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);


        $balance = Balance::create([
            'name' => 'OTROS ACTIVOS FINANCIEROS NO CORRIENTES.A COSTO AMORTIZADO',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'OTROS ACTIVOS FINANCIEROS NO CORRIENTES.(-) DETERIORO ACUMULADO DEL VALOR  DE OTROS ACTIVOS FINANCIEROS NO CORRIENTES MEDIDOS A COSTO AMORTIZADO (PROVISIONES PARA CRÉDITOS INCOBRABLES)',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'OTROS ACTIVOS FINANCIEROS NO CORRIENTES.A VALOR RAZONABLE',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);

        $balance = Balance::create([
            'name' => 'PORCIÓN NO CORRIENTE DE ARRENDAMIENTOS FINANCIEROS POR COBRAR',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);


        $balance = Balance::create([
            'name' => 'ACTIVOS POR IMPUESTOS DIFERIDOS.POR DIFERENCIAS TEMPORARIAS',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS POR IMPUESTOS DIFERIDOS.POR PÉRDIDAS TRIBUTARIAS SUJETAS A AMORTIZACIÓN EN PERIODOS SIGUIENTES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS POR IMPUESTOS DIFERIDOS.POR CRÉDITOS FISCALES NO UTILIZADOS.CRÉDITO TRIBUTARIO A FAVOR DEL SUJETO PASIVO (ISD)',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS POR IMPUESTOS DIFERIDOS.POR CRÉDITOS FISCALES NO UTILIZADOS.CRÉDITO TRIBUTARIO A FAVOR DEL SUJETO PASIVO (IMPUESTO A LA RENTA) ',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        $balance = Balance::create([
            'name' => 'ACTIVOS POR IMPUESTOS DIFERIDOS.POR CRÉDITOS FISCALES NO UTILIZADOS.OTROS',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
        
        $balance = Balance::create([
            'name' => 'OTROS ACTIVOS NO CORRIENTES',
            'type_1' => 'AT', 
            'type_2' => 'ANC', 
        ]);
//--------------------------------------------------------PASIVO---------------------------------------------------------------------------------------------//
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.CUENTAS Y DOCUMENTOS POR PAGAR COMERCIALES CORRIENTES.RELACIONADAS.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.CUENTAS Y DOCUMENTOS POR PAGAR COMERCIALES CORRIENTES.RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.CUENTAS Y DOCUMENTOS POR PAGAR COMERCIALES CORRIENTES.NO RELACIONADAS.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.CUENTAS Y DOCUMENTOS POR PAGAR COMERCIALES CORRIENTES.NO RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.A ACCIONISTAS, SOCIOS, PARTÍCIPES, BENEFICIARIOS U OTROS TITULARES DE DERECHOS REPRESENTATIVOS DE CAPITAL.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.A ACCIONISTAS, SOCIOS, PARTÍCIPES, BENEFICIARIOS U OTROS TITULARES DE DERECHOS REPRESENTATIVOS DE CAPITAL.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.DIVIDENDOS POR PAGAR.EN EFECTIVO',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.DIVIDENDOS POR PAGAR.EN ACTIVOS DIFERENTES DEL EFECTIVO',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS RELACIONADAS.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS NO RELACIONADAS.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR CORRIENTES.OTRAS NO RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'OBLIGACIONES CON INSTITUCIONES FINANCIERAS - CORRIENTES.RELACIONADAS.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'OBLIGACIONES CON INSTITUCIONES FINANCIERAS - CORRIENTES.RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'OBLIGACIONES CON INSTITUCIONES FINANCIERAS - CORRIENTES.NO RELACIONADAS.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'OBLIGACIONES CON INSTITUCIONES FINANCIERAS - CORRIENTES.NO RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'CRÉDITO A MUTUO',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PORCIÓN CORRIENTE DE OBLIGACIONES EMITIDAS',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        
        $balance = Balance::create([
            'name' => 'OTROS PASIVOS FINANCIEROS.A COSTO AMORTIZADO',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'OTROS PASIVOS FINANCIEROS.A VALOR RAZONABLE',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PORCIÓN CORRIENTE DE ARRENDAMIENTOS FINANCIEROS POR PAGAR',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'IMPORTE BRUTO ADEUDADO A LOS CLIENTES POR EL TRABAJO EJECUTADO EN CONTRATOS DE CONSTRUCCIÓN',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'IMPUESTO A LA RENTA POR PAGAR DEL EJERCICIO',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);


        $balance = Balance::create([
            'name' => 'PASIVOS CORRIENTES POR BENEFICIOS A LOS EMPLEADOS.PARTICIPACIÓN TRABAJADORES POR PAGAR DEL EJERCICIO',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PASIVOS CORRIENTES POR BENEFICIOS A LOS EMPLEADOS.OBLIGACIONES CON EL IESS',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PASIVOS CORRIENTES POR BENEFICIOS A LOS EMPLEADOS.JUBILACIÓN PATRONAL',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PASIVOS CORRIENTES POR BENEFICIOS A LOS EMPLEADOS.OTROS PASIVOS CORRIENTES POR BENEFICIOS A EMPLEADOS',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROVISIONES CORRIENTES.POR GARANTÍAS',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES CORRIENTES.POR DESMANTELAMIENTO',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES CORRIENTES.POR CONTRATOS ONEROSOS',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES CORRIENTES.POR REESTRUCTURACIONES DE NEGOCIOS',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES CORRIENTES.POR REEMBOLSOS A CLIENTES',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES CORRIENTES.POR LITIGIOS',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES CORRIENTES.POR PASIVOS CONTINGENTES ASUMIDOS EN UNA COMBINACIÓN DE NEGOCIOS',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES CORRIENTES.OTRAS',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);


        $balance = Balance::create([
            'name' => 'PASIVOS POR INGRESOS DIFERIDOS.ANTICIPOS DE CLIENTES',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PASIVOS POR INGRESOS DIFERIDOS.SUBVENCIONES DEL GOBIERNO',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'PASIVOS POR INGRESOS DIFERIDOS.OTROS',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'OTROS PASIVOS CORRIENTES.TRANSFERENCIAS CASA MATRIZ Y SUCURSALES (del exterior)',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        $balance = Balance::create([
            'name' => 'OTROS PASIVOS CORRIENTES.OTROS',
            'type_1' => 'PA', 
            'type_2' => 'PC', 
        ]);
        
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.CUENTAS Y DOCUMENTOS POR PAGAR COMERCIALES NO CORRIENTES.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.CUENTAS Y DOCUMENTOS POR PAGAR COMERCIALES NO CORRIENTES.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.CUENTAS Y DOCUMENTOS POR PAGAR COMERCIALES NO CORRIENTES.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.CUENTAS Y DOCUMENTOS POR PAGAR COMERCIALES NO CORRIENTES.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.OTRAS CUENTAS Y DOCUMENTOS POR PAGAR NO CORRIENTES.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);

        $balance = Balance::create([
            'name' => 'OBLIGACIONES CON INSTITUCIONES FINANCIERAS - NO CORRIENTES.RELACIONADAS.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'OBLIGACIONES CON INSTITUCIONES FINANCIERAS - NO CORRIENTES.RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'OBLIGACIONES CON INSTITUCIONES FINANCIERAS - NO CORRIENTES.NO RELACIONADAS.LOCALES',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'OBLIGACIONES CON INSTITUCIONES FINANCIERAS - NO CORRIENTES.NO RELACIONADAS.DEL EXTERIOR',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        
        $balance = Balance::create([
            'name' => 'CRÉDITO A MUTUO',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
         
        $balance = Balance::create([
            'name' => 'PORCIÓN NO CORRIENTE DE OBLIGACIONES EMITIDAS',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'OTROS PASIVOS FINANCIEROS NO CORRIENTES.A COSTO AMORTIZADO',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'OTROS PASIVOS FINANCIEROS NO CORRIENTES.A VALOR RAZONABLE',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        
        $balance = Balance::create([
            'name' => 'PORCIÓN NO CORRIENTE DE ARRENDAMIENTOS FINANCIEROS POR PAGAR',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PASIVO POR IMPUESTO A LA RENTA DIFERIDO',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);

        $balance = Balance::create([
            'name' => 'PASIVOS NO CORRIENTES POR BENEFICIOS A LOS EMPLEADOS.JUBILACIÓN PATRONAL',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PASIVOS NO CORRIENTES POR BENEFICIOS A LOS EMPLEADOS.DESAHUCIO',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PASIVOS NO CORRIENTES POR BENEFICIOS A LOS EMPLEADOS.OTROS PASIVOS NO CORRIENTES POR BENEFICIOS A EMPLEADOS',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);

        $balance = Balance::create([
            'name' => 'PROVISIONES NO CORRIENTES.POR GARANTÍAS',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES NO CORRIENTES.POR DESMANTELAMIENTO',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES NO CORRIENTES.POR CONTRATOS ONEROSOS',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES NO CORRIENTES.POR REESTRUCTURACIONES DE NEGOCIOS',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES NO CORRIENTES.POR REEMBOLSOS A CLIENTES',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES NO CORRIENTES.POR LITIGIOS',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES NO CORRIENTES.POR PASIVOS CONTINGENTES ASUMIDOS EN UNA COMBINACIÓN DE NEGOCIOS',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PROVISIONES NO CORRIENTES.OTRAS',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);


        $balance = Balance::create([
            'name' => 'PASIVOS POR INGRESOS DIFERIDOS.ANTICIPOS DE CLIENTES',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PASIVOS POR INGRESOS DIFERIDOS.SUBVENCIONES DEL GOBIERNO',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'PASIVOS POR INGRESOS DIFERIDOS.OTROS',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);


        $balance = Balance::create([
            'name' => 'OTROS PASIVOS NO CORRIENTES.TRANSFERENCIAS CASA MATRIZ Y SUCURSALES (del exterior) ',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);
        $balance = Balance::create([
            'name' => 'OTROS PASIVOS NO CORRIENTES.OTROS',
            'type_1' => 'PA', 
            'type_2' => 'PNC', 
        ]);





        $balance = Balance::create([
            'name' => 'CAPITAL SUSCRITO Y/O ASIGNADO',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);    
        $balance = Balance::create([
            'name' => '(-) CAP.SUSC. NO PAGADO, ACCIONES  EN TESORERÍA',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]); 
        
        $balance = Balance::create([
            'name' => 'APORTES DE SOCIOS, ACCIONISTAS, PARTÍCIPES, FUNDADORES, CONSTITUYENTES, BENEFICIARIOS U OTROS TITULARES DE DERECHOS REPRESENTATIVOS DE CAPITAL PARA FUTURA CAPITALIZACIÓN',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);    
        

        $balance = Balance::create([
            'name' => 'RESERVAS.RESERVA LEGAL',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        
        $balance = Balance::create([
            'name' => 'RESERVAS.RESERVA FACULTATIVA',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'RESERVAS.OTRAS',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  







        $balance = Balance::create([
            'name' => 'RESULTADOS ACUMULADOS.RESERVA DE CAPITAL',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'RESULTADOS ACUMULADOS.RESERVA POR DONACIONES',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'RESULTADOS ACUMULADOS.RESERVA POR VALUACIÓN (PROCEDENTE DE LA APLICACIÓN DE NORMAS ECUATORIANAS DE CONTABILIDAD - NEC)',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'RESULTADOS ACUMULADOS.SUPERÁVIT POR REVALUACIÓN DE INVERSIONES (PROCEDENTE DE LA APLICACIÓN DE NORMAS ECUATORIANAS DE CONTABILIDAD - NEC)',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'RESULTADOS ACUMULADOS.UTILIDADES ACUMULADAS DE EJERCICIOS ANTERIORES',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'RESULTADOS ACUMULADOS.(-) PÉRDIDAS ACUMULADAS DE EJERCICIOS ANTERIORES',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'RESULTADOS ACUMULADOS.RESULTADOS ACUMULADOS POR ADOPCIÓN POR PRIMERA VEZ DE LAS NIIF',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'RESULTADOS ACUMULADOS.UTILIDAD DEL EJERCICIO',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'RESULTADOS ACUMULADOS.(-)PÉRDIDA DEL EJERCICIO',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  






        $balance = Balance::create([
            'name' => 'OTROS RESULTADOS INTEGRALES ACUMULADOS.SUPERÁVIT DE REVALUACIÓN ACUMULADO.PROPIEDADES, PLANTA Y EQUIPO',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'OTROS RESULTADOS INTEGRALES ACUMULADOS.SUPERÁVIT DE REVALUACIÓN ACUMULADO.ACTIVOS INTANGIBLES',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'OTROS RESULTADOS INTEGRALES ACUMULADOS.SUPERÁVIT DE REVALUACIÓN ACUMULADO.OTROS',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'OTROS RESULTADOS INTEGRALES ACUMULADOS.GANANCIAS Y PÉRDIDAS ACUMULADAS POR INVERSIONES EN INSTRUMENTOS DE PATRIMONIO MEDIDOS A VALOR RAZONABLE CON CAMBIOS EN OTRO RESULTADO INTEGRAL',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'OTROS RESULTADOS INTEGRALES ACUMULADOS.GANANCIAS Y PÉRDIDAS ACUMULADAS POR LA CONVERSIÓN DE ESTADOS FINANCIEROS DE UN NEGOCIO EN EL EXTRANJERO',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'OTROS RESULTADOS INTEGRALES ACUMULADOS.GANANCIAS Y PÉRDIDAS ACTUARIALES ACUMULADAS',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'OTROS RESULTADOS INTEGRALES ACUMULADOS.LA PARTE EFECTIVA DE LAS GANANCIAS Y PÉRDIDAS DE LOS INSTRUMENTOS DE COBERTURA EN UNA COBERTURA DE FLUJOS DE EFECTIVO',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        $balance = Balance::create([
            'name' => 'OTROS RESULTADOS INTEGRALES ACUMULADOS.OTROS',
            'type_1' => 'PT', 
            'type_2' => 'PT', 
        ]);  
        
     
        
    }
}