@extends('informe_cliente.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('home') }}
    </div>
</div>

<div class="container">
    <div class="row bg-white ">
        <div class="col-md-12 mt-4">
        </div>
        <div class="col-md-12 mt-3">
        <center>
        <h3>{{$Informe->titulo1}}</h3>
            <h2>{{$Informe->titulo2}}</h2>
            </center>
        </div>
        
        <div class="col-md-1  ">
     
        </div>
       <div class="col-md-10 border  rounded my-3">
        
       <div class="mt-2 mx-2"><p class="text-dark mt-3"><b>CONCLUSIONES Y RECOMENDACIONES FINALES</b> </p>

<div class="text-dark text-justify mt-2">

        
<?php  
echo "$Informe->parrafo17"
?>
</div><!--
    <p class="text-justify mt-2">
    Luego de analizar en detalle las cifras financieras históricas de la empresa en cuanto se refiere a ventas, crédito, cobranza, gestión de activos, endeudamiento, entre otros, a la vez que se han elaborado diferentes indicadores para la medición de la gestión financiera de la empresa, se puede llegar a las siguientes conclusiones y recomendaciones:
    </p>

    <ol class="mt-1 ml-5 text-justify">
    <br><li type="disc"> <p>El lector de este Informe comprende que el trabajo realizado por ROADMAK SOLUTIONS CÍA. LTDA fue realizado de acuerdo a la Propuesta Económica para la Prestación de Servicios Profesionales de Consultoría presentada previamente y aprobada por su cliente y que por ende, el uso de este Informe es para el beneficio y provecho exclusivo de su cliente.</p></li>
    <br><li type="disc"> <p>Con respecto a los resultados, la empresa muestra muy buenos márgenes tanto a nivel bruto como a nivel operativo. Sin embargo, el margen neto del negocio es muy bajo o está en negativo. Por ende, una medida que debe tomar la empresa de forma urgente es la reducción de los gastos no operativos, es decir los gastos financieros y los impuestos. </p></li>
    <br><li type="disc"> Con respecto a la reducción del gasto financiero, se puede aplicar varias medidas para su reducción. Una de ellas es el cambio de la fuente de financiamiento a una fuente que sea más barata que la fuente actual. Los gastos financieros presentados han sido reportados en el formulario 101 como ‘intereses pagados a terceros’, razón por la cual se debe buscar una fuente de financiamiento más económica. </li>
    <br><li type="disc"> Otra medida que se podría tomar es invitar a esta tercera parte que hace las veces de financista, a formar parte del capital social de la empresa, para lo cual podría capitalizar una parte de la deuda más una parte de los intereses pendientes de pago. Si no se desea que este tercero se convierta en accionista mayoritario, los accionistas actuales deberían también aportar un monto mayor al capital social e incluso se recomienda la capitalización de reservas y resultados. </li>
    <br><li type="disc"> Con respecto a los impuestos, la empresa debe cuidar la calidad tributaria del gasto, es decir que debe procurar que los gastos sean deducibles a efectos de calcular el impuesto a la renta. Un mayor gasto de tipo no deducible tiene como consecuencia el aumento del impuesto a la renta causado. Para esto, es importante que el departamento contable de la empresa se actualice en temas tributarios, específicamente lo relacionado al impuesto a la renta. </li>
    <br><li type="disc"> Con respecto a la posición financiera de la empresa, se puede observar que la empresa se está demorando seis meses en generar efectivo, aumentando así de gran manera sus necesidades de capital de trabajo. Esto se debe a que sus cobros a clientes demoran más tiempo que sus pagos a proveedores, debiendo la empresa financiar este plazo de tiempo con su dinero propio, lo que aumenta sus necesidades de efectivo. </li>
    <br><li type="disc"> Una de las medidas que puede tomar la empresa para la reducción de su cartera es la disminución del plazo de crédito, si es que el mismo ha sido previamente comunicado y aceptado por los clientes. La empresa podría hacer un estudio de morosidad de la cartera y en función a los resultados obtenidos por cada cliente, podría determinar plazos exclusivos de cobro para cada cliente. Aquellos clientes con el peor historial de pagos no tendrían crédito, sino que deberían pagar sus compras de contado. </li>
    <br><li type="disc"> Otra de las medidas que puede tomar la empresa es la presión de la cobranza, para lo cual deberá estudiar la conveniencia de pagar bonos de recompensa a los cobradores por cada cobranza efectiva. El criterio costo-beneficio de esta estrategia será la comparación del costo de la estrategia (el pago del bono a los cobradores) versus el beneficio de la estrategia (tener mayor liquidez para invertir en el negocio). </li>
    <br><li type="disc"> Otra medida adicional que puede tomar la empresa es ofrecer a los clientes descuentos por pronto pago, en la cual se ofrece a los clientes un descuento adicional en sus compras si pagan la totalidad de sus cuentas dentro de los primeros 10 a 15 días luego del despacho. El criterio costo-beneficio de esta estrategia será la comparación del costo de la estrategia (el costo del descuento ofrecido) versus el beneficio de la estrategia (tener mayor liquidez para invertir en el negocio). </li>
    <br><li type="disc"> Una medida adicional que puede tomar la empresa es la venta de cartera o factoring, por medio de la cual la empresa puede obtener liquidez inmediata a cambio de ceder facturas de clientes con buen historial de pagos, a un factor o empresa de factoring. El criterio costo-beneficio de esta estrategia será la comparación del costo de la estrategia (pago del 1% al 3% por concepto de gastos operativos sobre el monto total de la operación, más una tasa de interés anual de entre 12% a 15% calculada sobre el monto adelantado inicialmente) versus el beneficio de la estrategia (tener mayor liquidez para invertir en el negocio). Empresas de factoring que actualmente están en el mercado son Logros Factoring y Corpei Capital. </li>
    <br><li type="disc"> Por el lado de los proveedores internacionales, la empresa tiene actualmente buenos plazos de pago (alrededor de 90 días). Estos plazos deben cuidarse apropiadamente, pagando a los proveedores en el tiempo requerido. Por ello, se exhorta a la empresa de cuidar los plazos de pago que actualmente tienen. </li>
    <br><li type="disc"> Con respecto a la estructura de capital de la empresa, la información presentada en los formularios 101 no muestra deudas financieras de corto o largo plazo, aunque sí muestra otras cuentas por pagar de largo plazo con montos muy altos, los cuales representan el 65% del total de activos. Adicionalmente, el patrimonio que se muestra es muy pequeño y tan solo equivale al 1,5% del total de activos. </li>
    <br><li type="disc"> Por las razones antes explicadas, se recomienda la capitalización inmediata de la empresa, empezando por la elevación al capital social de los aportes para futuras capitalizaciones y los resultados. Adicionalmente es necesario que los accionistas realicen aportes de capital para aumentar el patrimonio de la empresa. </li>
    <br><li type="disc"> Por último, y como medida complementaria a la reducción de los gastos no operativos, se puede ofrecer a los acreedores a los que pertenecen las cuentas por pagar a largo plazo, a ser accionistas de la empresa, a fin de capitalizar la misma y de esta forma aumentar su solvencia, haciéndola sujeto de crédito ante las entidades bancarias. </li>
    </ol>

    <p class="text-justify mt-2">
    Las conclusiones y recomendaciones generadas a lo largo del presente informe deberían derivar en la creación, actualización y mejora de las políticas financieras administrativas de la empresa, que permitan una mejor supervisión en las áreas críticas del negocio, como son Comercial, Finanzas y Operaciones.
    </p>
    <p class="text-justify mt-2">
    De manera similar, estas políticas, nuevas o mejoradas, deberían servir como herramientas del Directorio para establecer premisas futuras que permitan un mejor control de gestiones, pero principalmente deben permitir establecer estrategias internas claras sobre el rumbo a seguir del negocio.
    </p>

    <br><br><br><p class="text-center mt-2"><b>Dr. Gabriel Rovayo</b></p>
    <p class="text-center mt-2">Gerente General</p>
    <p class="text-center mt-2">Roadmak Solutions Cia. Ltda</p>
-->

    </div>
        </div>
        <div class="col-md-1  ">
      
        </div>
</div>




</div>

@endsection