@extends('informe.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('informe.index',$consultoria) }}">Informe</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$Informe->titulo20}}</li>
        </ol>
    </nav>
    </div>
</div>
<style>
.embed-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 700px;
    overflow: hidden;
}
.embed-container embed {
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
<div class="container">
    
    <div class="row bg-white ">
   
<!--         <div class="col-md-12 mt-4">
        </div>
        <div class="col-md-12 mt-3">
            <center>
                <h3>{{$Informe->titulo1}}</h3>
                <h2>{{$Informe->titulo2}}</h2>
            </center>
        </div> 
        <div class="col-md-1  ">
        </div> -->

       

        <div class="col-md-10   rounded my-3">
            <!-- <div class="mt-2 mx-2">
                
                    <p class="text-dark mt-3">
                        <b>5. {{$Informe->titulo20}}</b>
                    </p>
                    <br>
                <div class="text-dark text-justify mt-2">            
                    ?php   
                    echo "$Informe->parrafo17"
                    ?>
                </div> -->
                <div class="mt-2 mx-2">
                    <div class="embed-container">
                        <embed src="{{ asset('informes/Informe_1_2019_9_2.pdf') }}" width="100%" height="600"  frameborder="0"  alt="pdf" allowfullscreen />
                        <!-- <iframe src="{{ asset('informes/Informe_2_2019_9_2.pdf') }}" height="600"></iframe> -->

                    </div>
                    <div class="mt-2 mx-2">
                        <center>
                        @if($validaconsultoria->estado=='cerrado')
                        @else
                        <!--  <a class=" col-3 btn btn-dark" style="width:50%; font-size:10px" onclick="window.location.reload()", href="" title="Actualizar">Actualizar Cambios</a> -->
                            <a title="Actualizar" class=" col-3 btn btn-dark" style="width:50%; font-size:10px" href="{{route('informe.fRefreshPage',$consultoria)}}">Actualizar Cambios</a>
                            <a class=" col-3 btn btn-dark" style="width:50%; font-size:10px" href="{{ route('informe.recomendaciones_edit',$consultoria) }}" target="_blank" onclick="window.open(this.href, this.target, 'top=70,left=350,width=777,height=907'); return false;">Editar</a> 
                        @endif
                        </center>
                    </div>
                </div>
        </div>
   
    </div>
   
</div>
@endsection