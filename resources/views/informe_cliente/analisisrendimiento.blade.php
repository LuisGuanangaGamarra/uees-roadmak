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
echo "$Informe->parrafo7"
?>
</div>
<!--
        <p class="text-justify mt-2">
        Dada la información financiera presentada, se ha procedido a la obtención de los siguientes ratios de análisis de márgenes y rendimiento de la inversión:        <br>
        </p>
        <br><p class="text-center mt-2">imagen</p>     
        <br>

        <p class="text-justify mt-2">
        Sobre estos ratios se emite los siguientes comentarios:
        </p>

        <ol class="mt-1 ml-5 text-justify">
        <br><li type="disc">El margen bruto se ha mantenido estable en los últimos tres años reportados, e inclusive se ha incrementado ligeramente, pasando del 30% en 2015 a 32% en 2017. Algo similar ocurre en el margen operativo EBITDA, el cual pasó de 11% en 2015 a 13% en 2017. A pesar de estos buenos resultados, el margen neto resultó ser escaso en 2015 y negativo en 2016. Para el año 2017, el margen neto se ubicó en 3,5%.</li>
        <br><li type="disc">Estos indicadores examinados demuestran que la empresa tiene mucha carga en los gastos de tipo no operativo (gastos financieros e impuestos). Tal es la carga de estos gastos que en 2015 se consumen casi toda la utilidad operativa y en 2016 fueron mayores que esta utilidad. Si bien en 2017 los resultados netos fueron positivos, los gastos operativos siguen consumiendo gran parte de la utilidad operativa.</li>
        <br><li type="disc">Los indicadores de rentabilidad ROA y ROE se reportan en negativo en los dos periodos examinados. En 2016 se reportan en negativo por cuanto en este ejercicio hubo una pérdida neta de US$ 20 mil. En 2017 estos indicadores siguen en negativo por cuanto en 2016 no hubo el suficiente patrimonio para absorber la pérdida de este año, por tal razón el patrimonio terminó con un saldo negativo de US$ 14 mil. El saldo de patrimonio de 2016 es la base para el cálculo tanto del ROA como del ROE en 2017, toda vez que la empresa no reporta deudas financieras contratadas.</li>
        <br><li type="disc">La tasa promedio de depreciación está en niveles aceptables para el giro de negocio al que se dedica la empresa. En la información presentada no hay detalle de los impuestos causados, por lo que no fue posible calcular una tasa impositiva promedio. Tampoco la empresa no presenta deudas financieras, por lo que no fue posible calcular una tasa promedio anual de intereses.</li>
        </ol>
         -->
    </div>
        </div>
</div>
</div>
@endsection