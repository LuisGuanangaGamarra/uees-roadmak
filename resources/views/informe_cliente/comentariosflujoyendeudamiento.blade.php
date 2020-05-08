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
echo "$Informe->parrafo15"
?>
</div>
<!--
        <p class="text-justify mt-2">
        Tal como se observa en los flujos, la capacidad de pago de la empresa es buena en todos los periodos, pues luego de pagar capital e intereses por el nuevo endeudamiento, sigue habiendo un flujo acumulado positivo, lo que indica que la empresa no solo no se queda sin efectivo o se sobregira, sino que además cuenta con efectivo excedente producto de un fondo de maniobra o capital de trabajo positivo.
        </p>

        <br>
        <p class="text-center mt-2"><b><u>Tabla de Amortización mensual del Endeudamiento propuesto</u></b></p>     
        <br>
        <p class="text-center mt-2">imagen</p>     
        <br>
         -->
    </div>
        </div>
</div>
</div>
@endsection