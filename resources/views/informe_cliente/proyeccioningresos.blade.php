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


<div class="text-dark text-justify mt-2">

        
<?php  
echo "$Informe->parrafo11"
?>
</div>
<!--
        <p class="text-justify mt-2">
        Para la proyección de ingresos, se ha trabajado con registros contables auxiliares que contienen datos históricos de ventas de los últimos 41 meses, contados desde el mes de enero de 2015 hasta mayo de 2018. Al examinar los datos históricos, se puede observar con claridad que la tendencia de las ventas de la empresa es al alza, a pesar de la estacionalidad representada por los picos y valles que indican variación de los ingresos reales con relación al promedio.
        </p>
        <p class="text-center mt-2">imagen</p>     
        <br>
        <p class="text-justify mt-2">
        La tendencia así observada responde a una función de tipo lineal cuya ecuación es:
        </p>
        <p class="text-center mt-2">imagen</p>     
        <br>

        <p class="text-justify mt-2">
        En esta ecuación, (y) representa la venta mensual proyectada en dólares, mientras que (x) representa el número correspondiente al mes y año que se desea proyectar. Por ejemplo, si la venta histórica del mes de mayo de 2018 representa el dato 41, para proyectar la venta del mes siguiente, (x) deberá ser el mes número 42.
        </p>
        <br>
        <p class="text-justify mt-2">
        Una vez realiza la proyección de la tendencia lineal de los ingresos, se procede a incorporar a tal tendencia, la variación estacional observada en los periodos históricos, de tal forma que la proyección de ingresos tenga un comportamiento similar a los datos originales reportados por la empresa.
        </p>
        <p class="text-center mt-2">imagen</p>     
        <br>

        <p class="text-justify mt-2">
        Una vez realizada la proyección mensual, la cual abarca 79 meses o 6 años 7 meses, desde junio 2018 a diciembre 2024, se procede a la suma de los periodos de enero a diciembre para obtener las proyecciones anuales finales para los periodos 2018 a 2024, los cuales quedan finalmente como sigue:
        </p>
        <p class="text-center mt-2">imagen</p>     
        <br>

         -->
    </div>
        </div>
</div>
</div>
@endsection