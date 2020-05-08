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
echo "$Informe->parrafo10"
?>
</div>
<!--
        <p class="text-justify mt-2">
        El horizonte de proyección establece el número de periodos a proyectarse en una valoración. Este horizonte puede estar dado en periodos anuales o de menor duración. De acuerdo a las recomendaciones de la CEPAL, es preferible que los proyectos con vida indefinida se realicen en un horizonte mínimo de 5 años. Las proyecciones presentadas en este informe tienen un horizonte de proyección de 7 años, considerando un archivo de información histórica de los últimos 3 años.
        </p>
-->
         
    </div>
        </div>
</div>
</div>
@endsection