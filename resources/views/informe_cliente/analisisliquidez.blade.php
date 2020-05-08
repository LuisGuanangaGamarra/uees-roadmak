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
        
       <div class="mt-2 mx-2"><p class="text-dark mt-3"><b>3. ANÁLISIS DE INFORMACIÓN FINANCIERA</b> </p>

<div class="text-dark text-justify mt-2">

        
<?php  
echo "$Informe->parrafo9"
?>
</div>
<!--
        <p class="text-justify mt-2">
        Dada la información financiera presentada, se ha procedido a la obtención del balance financiero de inversión y financiamiento:
        <br><p class="text-center mt-2">imagen</p>     
        <br>

        <p class="text-justify mt-2">
        Sobre este balance y sus indicadores se emite los siguientes comentarios:
        </p>

        <ol class="mt-1 ml-5 text-justify">
        <br><li type="disc">Las NOF negativas no son perjudiciales a menos que exista un Fondo de Maniobra en negativo, como sí es el caso de la empresa. Las NOF negativas indican que la empresa se está financiando con pasivos sin costo, sean éstos de corto o largo plazo, lo cual en sí no es un problema. El verdadero problema consiste en que el patrimonio, al ser tan bajo (y de paso al no existir deudas financieras de largo plazo), no logra cubrir las inversiones en activos no corrientes, por tanto estos activos terminan siendo financiados por los pasivos sin costo.</li>
        <br><li type="disc">La situación financiera graficada demuestra la gravedad del problema. Las NOF negativas (en rojo) financian tanto los excedentes de efectivo (en azul) así como los activos no corrientes (en verde) e incluso terminan financiando el patrimonio (en morado) cuando éste se vuelve negativo durante 2016. En condiciones normales las NOF deben estar graficadas al lado izquierdo y no al lado derecho del balance, mientras que los recursos a largo plazo (deuda a largo plazo y patrimonio) deberían ser iguales o mayores a los activos no corrientes.</li>
        <br><p class="text-center mt-2">imagen</p>     
        <br>
        <br><li type="disc">Adicionalmente, para el periodo 2017 aparece un saldo de efectivo en negativo de US$ 105 mil, que de acuerdo al estado de flujo de efectivo se genera debido a que los pagos por concepto de amortización de deudas más gastos financieros (los cuales suman US$ 395 mil), son mayores al flujo neto generado por el activo (actividades de operación más inversión que en 2017 suman US$ 125 mil) más los ingresos por contratación de nueva deuda por US$ 156 mil. Esta situación crea un déficit de US$ 114 mil para 2017, que sumado al saldo anterior de efectivo de US$ 8,2 mil, genera un saldo negativo final de US$ 105 mil.</li>
        <br><li type="disc">Por último, el ciclo de conversión de efectivo muestra que la empresa se toma alrededor de seis meses en generar efectivo, pues en 2017 este indicador está en 178 días. Este ciclo de efectivo fue calculado sin considerar los días de pago por las cuentas por pagar a compañías relacionadas.</li>


        </ol>
         -->
    </div>
        </div>
</div>
</div>
@endsection