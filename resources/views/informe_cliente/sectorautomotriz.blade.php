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
echo "$Informe->parrafo4"
?>
</div>

<!--
        <p class="text-justify mt-2">
        De acuerdo a estadísticas publicadas por la Asociación de Empresas Automotrices del Ecuador (AEADE), en Ecuador existe un total de:
        </p>

        <ol class="mt-1 ml-5 text-justify">
        <li type="disc">4 empresas ensambladoras de vehículos</li>
        <li type="disc">92 empresas de venta de repuestos automotrices</li>
        <li type="disc">1.271 empresas comercializadoras e importadoras dedicadas a la venta de vehículos nuevos y usados</li>
        <li type="disc">3.126 empresas dedicadas a actividades de comercio automotor (mantenimiento, reparación, venta de partes, etc.)</li>
        </ol>


        <p class="text-justify mt-2">
        En la actualidad, el parque automotor ecuatoriano consta de 2,26 millones de unidades, entre vehículos livianos (automóviles, camionetas, SUV) y vehículos comerciales (VAN, buses, camiones). Este total de unidades se desagrega de la siguiente forma:
        </p>

        <ol class="mt-1 ml-5 text-justify">

        <li type="disc">Vehículos Livianos: 1,96 millones de unidades</li> 
        <ol class="mt-2 ml-5 text-justify">
        <li type="circle">Automóviles: 968 mil</li>
        <li type="circle">Camionetas: 577 mil</li>
        <li type="circle">SUV: 419 mil</li>
        </ol>   

        <li type="disc">Vehículos Comerciales: 300 mil unidadessss</li>
        <ol class="mt-2 ml-5 text-justify">
        <li type="circle">VAN: 45 mil</li>
        <li type="circle">Buses: 33 mil</li>
        <li type="circle">Camiones: 223 mil</li>
        </ol> 

        </ol>
        
        <p class="text-justify mt-2">
        Las ventas de vehículos sufrieron una caída muy fuerte entre los años 2015 y 2016, para luego tener una fuerte recuperación en el año 2017, periodo en el cual la importación anual de vehículos fue de más de 105 mil unidades, superior a lo vendido en los años 2015 (81.309 unidades) y 2016 (63.555 unidades).
        </p>  

        <p class="text-center mt-2">imagen</p>     
        <br><br>
        
        <p class="text-justify mt-2">
        A consecuencia de la evolución de las ventas, las importaciones de vehículos sufrieron una caída muy fuerte entre los años 2015 y 2016, para luego tener una fuerte recuperación en el año 2017, periodo en el cual la importación anual de vehículos fue de 70.203 unidades, es decir el doble del periodo 2015 (35.916) y más del doble del periodo 2016 (31.761).
        </p>

        <p class="text-center mt-2">imagen</p>     
        <br><br>
        
        <p class="text-justify mt-2">
        La tendencia observada en el año 2017 continúa durante el año 2018. En el periodo comprendido enero-mayo 2018, se ha importado un total de 39.736 unidades, mientras que en el periodo enero-junio 2018, se ha vendido un total de 68.280 unidades, siendo solo 587 de éstas dirigidas a la exportación.
        </p>

        <br>
        
        <p class="text-justify mt-2">
        Tan solo el mes de mayo de 2018 registra el mayor número de importaciones (9.169 unidades) con respecto al mes de mayo de años anteriores. De forma similar, el mes de junio de 2018 registra el mayor nivel de ventas (12.590 unidades) con respecto al mes de junio de años anteriores.
        </p>

        <p class="text-center mt-2">imagen</p>     
        <br><br>

        <p class="text-justify mt-2">
        La edad promedio del parque automotor es de 16,2 años, distribuidos de la siguiente forma:
        </p>

        <p class="text-center mt-2">imagen</p>     
        <br><br>
          -->
    </div>
        </div>
</div>
</div>
@endsection