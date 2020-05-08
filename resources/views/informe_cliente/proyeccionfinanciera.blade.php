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
        
       <div class="mt-2 mx-2"><p class="text-dark mt-3"><b>4. METODOLOGÍA DE ELABORACIÓN DE PROYECCIONES</b> </p>

<br>
<div class="text-dark text-justify mt-2">

        
<?php  
echo "$Informe->parrafo12"
?>
</div>
       <!--
        <br>
        <p class="text-justify mt-2">
        Los indicadores claves (Key Drivers) más importantes, fueron examinados en detalle en la sección anterior de este informe, correspondiente al diagnóstico financiero inicial. Indicadores tales como margen bruto, margen operativo, días de cobro, días de inventario, días de pago, entre otros, fueron examinados y comentados en la sección anterior.
        </p>

        <br>
        <p class="text-justify mt-2">
        Estos Key Drivers, junto con otros indicadores secundarios utilizados principalmente para conocer relaciones o proporciones entre cuentas contables, son utilizados tanto para definir los principales objetivos financieros de la empresa, así como también para realizar las debidas proyecciones de demás componentes de resultados (luego de proyectar los ingresos) tales como los costos de ventas y los gastos operativos, así como las proyecciones de elementos de situación financiera (activos, pasivos y patrimonio).
        </p>

        <br>
        <p class="text-justify mt-2">
        Los objetivos financieros de la empresa en cuanto se refiere a resultados, posición financiera y flujos de efectivo, son establecidos y medidos en base a estos indicadores claves, en los cuales la empresa a futuro debe trabajar mediante planes de acción para alcanzar los siguientes niveles de indicadores:
        </p>

        <br>
        <p class="text-center mt-2">imagen</p>     
        
        <br>
        <p class="text-justify mt-2">
        Como resultado de la aplicación de estos indicadores, junto con la proyección de ventas, se espera alcanzar los siguientes resultados:
        </p>

        <br>
        <p class="text-center mt-2">imagen</p>     
          -->      
    </div>
        </div>
</div>
</div>
@endsection