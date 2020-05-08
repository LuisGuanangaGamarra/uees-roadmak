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
        
        <div class="mt-2 mx-2"><p class="text-dark mt-3"><b>2. ANÁLISIS MACROECONÓMICO DEL PAÍS Y LA INDUSTRIA</b> </p>


        <div class="text-dark text-justify mt-2">

                
<?php  
echo "$Informe->parrafo3"
?>
</div>


   <!--     <br><p style="color:#2FB5D2;"><b>2.1. Análisis de la situación económica del país</b></p>
        <p class="text-justify mt-2">

        De acuerdo a estadísticas publicadas por el Banco Central del Ecuador (BCE), en el cuarto trimestre de 2017, el PIB de Ecuador, a precios constantes, mostró una tasa de variación trimestral de 1.2% (t/t-1, respecto al tercer trimestre de 2017); y, una variación inter anual (t/t-4, respecto al cuarto trimestre de 2016) de 3.0%.
        <br><br>
        
        <p class="text-center mt-2">imagen</p>  -->
      
        <!-- llama la imagen de la ruta  /var/www/html/uees-roadmak/storage/images 
        por medio del controller  ImageController.php -->

    <!--  <img src='/images/miauuuu.png' />


        
        <br><br>

        En este contexto, la variación interanual (t/t-4) del PIB fue de 3.0% para el cuarto trimestre de 2017; en este contexto el VAB No Petrolero registró un crecimiento de 4.1%, y el VAB Petrolero mostró una tasa de variación de -6.9%.        <br><br>
        <p class="text-center mt-2">imagen</p>     
        <br><br>

        El Índice de Confianza del Consumidor (ICC) registró 40.3 puntos en febrero de 2018. La tendencia de la serie desde junio de 2016 continúa siendo creciente.        <br><br>
        <p class="text-center mt-2">imagen</p>     
        <br><br>

        El Índice de la Actividad Económica Coyuntural (IDEAC) a partir del segundo semestre de 2014 hasta el primer trimestre de 2016 registra una nueva desaceleración, para activarse en los siguientes dos trimestres del mismo año; mientras que en 2017 el IDEAC corregido (CT) aplana su tendencia, alcanzando en febrero de 2018 un nivel de 159.2 puntos.        <br><br>
        <p class="text-center mt-2">imagen</p>     
        <br><br>

        De acuerdo a estadísticas publicadas por el Banco Central del Ecuador (BCE), en el cuarto trimestre de 2017, el PIB de Ecuador, a precios constantes, mostró una tasa de variación trimestral de 1.2% (t/t-1, respecto al tercer trimestre de 2017); y, una variación inter anual (t/t-4, respecto al cuarto trimestre de 2016) de 3.0%.
        <br><br>
        <p class="text-center mt-2">imagen</p>     
        <br><br>

        En febrero de 2018, el Ciclo del Índice de Confianza Empresarial (ICE) se encontró 1.8% por sobre la tendencia de crecimiento de largo plazo. Además, en el gráfico se presenta la relación de este índice con la tasa de crecimiento anual del PIB trimestral, la cual fue de 3% para el cuarto trimestre de 2017        <br><br>
        <p class="text-center mt-2">imagen</p>     
        <br><br>

        Este comportamiento del ciclo se evidencia en casi todos los sectores económicos, como industrias, comercio y construcción, y principalmente en el sector servicios donde la subida del indicador es de 2,2%, la mayor de los cuatro sectores.        <br><br>
        <p class="text-center mt-2">imagen</p>     
        <br><br>

        En el cuarto trimestre de 2017 la Inversión Extranjera Directa registró un flujo de USD 82.6 millones, cifra inferior en USD 67.4 millones si la comparamos con el tercer trimestre de 2017 (USD 150.0 millones). Las ramas de actividad en donde más se ha invertido fueron: Industria manufacturera, Agricultura, silvicultura y pesca, Explotación de minas y canteras, Construcción y Servicios prestados a empresas.        <br><br>
        <p class="text-center mt-2">imagen</p>     
        <br><br>
        De acuerdo a los gráficos estadísticos mostrados anteriormente, el Ecuador se encuentra en un ciclo económico de ‘Expansión, al igual que otros países del resto del mundo tales como Alemania, Brasil, Chile, Italia y Japón.        <br><br>
        <p class="text-center mt-2">imagen</p> 

        </p>      
-->
    </div>
        </div>
</div>
</div>
@endsection