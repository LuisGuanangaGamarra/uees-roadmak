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
echo "$Informe->parrafo8"
?>
</div>
<!--
        <p class="text-justify mt-2">
        Dada la información financiera presentada, se ha procedido a la obtención de los siguientes ratios de análisis de rotaciones:        </p>
        <br><p class="text-center mt-2">imagen</p>     
        <br>

        <p class="text-justify mt-2">
        Sobre estos ratios se emite los siguientes comentarios:
        </p>

        <ol class="mt-1 ml-5 text-justify">
        <br><li type="disc">A simple vista se puede observar un problema que afecta a la liquidez de la empresa, y es el hecho de que los cobros a clientes demoran más tiempo que los pagos a proveedores. La empresa ha incrementado su plazo promedio de cobros a clientes, pasando de 112 días en 2015 a 134 días en 2017 (en términos de saldos netos, la cuenta por cobrar de clientes de 2017 se incrementó en 46% con respecto al saldo del periodo anterior). Para otras clases de cobros, la empresa se mantiene en un estándar de 29 días en los dos últimos años.</li>
        <br><li type="disc">En cambio, el plazo promedio de pagos a proveedores del exterior por concepto de mercadería importada, se mantiene en un promedio de 84 días durante los dos últimos años. Para el año 2017, entre los días de cobro a clientes y los días de pago a proveedores del exterior, existe un desfase de 51 días. Los días de pago por otros conceptos, están en niveles razonables, siendo que éstos involucran las cuentas por pagar con compañías relacionadas.</li>
        <br><li type="disc">Para el último año reportado, el manejo del inventario reporta una mejoría en su rotación con respecto al año inmediato anterior, pues en 2016 la rotación de inventario fue de 170 días, mientras que en 2017 esta rotación fue de 132 días. Esto produce una mejora al reducir el stock de mercaderías y así generar más efectivo para las operaciones en su conjunto.</li>
        <br><li type="disc">La proporción de beneficios y aportes por pagar se mantiene en niveles bastante aceptables a pesar de su ligero crecimiento observado.</li>

        </ol>
         -->
    </div>
        </div>
</div>
</div>
@endsection