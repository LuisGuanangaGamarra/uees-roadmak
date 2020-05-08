@extends('informe.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('informe.index',$consultoria) }}">Informe</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$Informe->titulo15}}</li>
  </ol>
</nav>
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
        
        <div class="mt-2 mx-2">
        
        <p class="text-dark mt-3">
                <b>4. {{$Informe->titulo13}}</b>
                <br>
                <b>4.2. {{$Informe->titulo15}}</b>
            </p>
            <br>

        <div class="text-dark text-justify mt-2">

                
<?php  
echo "$Informe->parrafo11"
?>
</div>


<div class="col-12 mb-3">
 <center>
@if($validaconsultoria->estado=='cerrado')
@else
    <a class=" col-3 btn btn-dark" style="width:50%; font-size:10px" onclick="window.location.reload()", href="" title="Actualizar">Actualizar Cambios</a>
    <a class=" col-3 btn btn-dark" style="width:50%; font-size:10px" href="{{ route('informe.proyeccion_ingresos_edit',$consultoria) }}" target="_blank" onclick="window.open(this.href, this.target, 'top=70,left=350,width=777,height=907'); return false;">Editar</a> 
@endif
 </center> 
 </div>
 </div>

</div>
</div>
@endsection