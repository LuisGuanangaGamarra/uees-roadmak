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
echo "$Informe->parrafo13"
?>
</div>
        <!--
        <br>
        <p class="text-justify mt-2">
        La administración de la empresa espera contratar en los próximos meses, un endeudamiento de largo plazo por un monto de entre US$ 500 mil a US$ 700 mil, en un plazo promedio de 5 a 7 años. Para la proyección de este endeudamiento, se ha considerado un monto de US$ 600 mil, a una tasa efectiva anual de 12%.
        </p>

        <br>
        <p class="text-justify mt-2">
        El sistema de amortización planteado es el sistema francés, con pagos mensuales de capital e interés, sin periodos de gracia, por un plazo total de 6 años o 72 meses contados a partir del mes de septiembre de 2018. El resumen anual de pagos de capital e intereses se presenta a continuación:
        </p>
        <br>
        <p class="text-center mt-2">imagen</p>     
        -->
          
                
    </div>
        </div>
</div>
</div>
@endsection