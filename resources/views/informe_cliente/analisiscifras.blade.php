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
echo "$Informe->parrafo6"
?>
</div>
<!--
        <p class="text-justify mt-2">
        Luego de la observación de los estados financieros, a simple vista se pueden determinar varios factores importantes:
        <br>
        <ol class="mt-1 ml-5 text-justify">
        <li type="disc">La tendencia de las ventas ha sido creciente, aunque hubo una ligera reducción del 5,4% de las ventas del año 2016 con respecto al periodo anterior. Para el año 2017 las ventas netas fueron de US$ 1,25 millones lo que supone un incremento de 41% con respecto al año anterior.</li>
        <br><li type="disc">Los costos de ventas han seguido una tendencia similar a las ventas, dado que para 2016 los costos disminuyeron también en un 5,2% y para 2017 se incrementaron en casi 38%. En este sentido, la empresa se ha adaptado muy bien a los escenarios variables de ventas, tal como se observa en el gráfico a continuación.</li>
        <br><p class="text-center mt-2">imagen</p>     
        <br>
        <br><li type="disc">Los principales gastos operativos de la empresa son los gastos de sueldos, que en promedio representan el 71% de los gastos operativos totales, seguido de los gastos de viaje, los cuales representan en promedio el 12% de la misma base anterior. También en el manejo de los gastos, la empresa ha mostrado adaptabilidad, por cuanto para 2016 los gastos operativos disminuyeron un 7% mientras que para 2017 los mismos aumentaron casi 36%.</li>
        <br><li type="disc">El total de activos de la empresa supera en todo momento el millón de dólares, a excepción del periodo 2016 en el cual los activos disminuyeron a US$ 941 mil. De éstos, en promedio el 84% son activos corrientes y el 16% corresponden a activos no corrientes. Los principales activos corrientes son sus cuentas por cobrar y sus inventarios, los cuales representan el 36% y 30% del total de activos, respectivamente.</li>
        <br><li type="disc">El total de pasivos representa en promedio el 98% del total de activos, de los cuales sus principales pasivos son de tipo no corriente. De acuerdo al formulario 101, sus principales pasivos no corrientes corresponden a otras cuentas por pagar no corrientes y a otros pasivos no corrientes. </li>
        <br><li type="disc">Por el lado de los pasivos corrientes, sus principales cuentas son las cuentas por pagar de proveedores del exterior y otras cuentas por pagar con compañías relacionadas. Estas dos cuentas representan en promedio el 16% y el 13% del total de activos, respectivamente.</li>
        <br><li type="disc">El patrimonio de la empresa es muy bajo, pues apenas representa en promedio 1,5% del total de activos. Del total de patrimonio en el último periodo, tan solo US$ 800 corresponde a capital social mientras que existe US$ 25 mil en aportes para futuras capitalizaciones y cerca de US$ 45 mil en resultados del ejercicio actual. Estos resultados no han sido objeto de distribución en reservas, impuestos o participación a trabajadores.</li>

  
        </ol>
    -->     
    </div>
        </div>
</div>
</div>
@endsection