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
echo "$Informe->parrafo5"
?>
</div>
<!--
        <p class="text-justify mt-2">
        Los Estados Financieros sobre los cuales se procedió a realizar el respectivo análisis previo a la proyección, fueron los correspondientes a los ejercicios 2015 a 2017, de acuerdo a la información proporcionada por la empresa. Se procedió a reestructurar la información financiera descrita en los estados financieros, para presentarla de acuerdo a los estándares internacionales de información financiera. Se presenta a continuación, los estados financieros históricos.        
        </p>

        <br>
        <ol class="mt-1 ml-5 text-justify">
        <li type="a">Estado de Resultados Integrales</li>
        <p class="text-center mt-2">imagen</p>     
        <br>
        <li type="a">Estado de Situación Financiera</li>
        <p class="text-center mt-2">imagen</p>     
        <br>
        <li type="a">Estado de Flujos de Efectivo</li>
        <p class="text-center mt-2">imagen</p>     
        <br>
        </ol>
         -->
    </div>
        </div>
</div>
</div>
@endsection