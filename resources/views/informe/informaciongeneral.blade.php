@extends('informe.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Informe</li>
  </ol>
</nav>
    </div>
</div>
<div class="container">
    <div class="row bg-white ">
        <div class="col-md-12 mt-4">
        </div>
        <div class="col-md-12 mt-3">
           <!--  <center>
            <h3>{{$Informe->titulo1}}</h3>
            <h2>{{$Informe->titulo2}}</h2>
            </center> -->
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-10 border  rounded mt-3 mb-5">
            <div class="mt-2 mx-2">
                <div class="text-dark text-justify mt-2">
                    <?php  
                    echo "$Informe->parrafo1"
                    ?>
                </div>
            </div>    
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-12 mb-3">
            <center>
            @if($validaconsultoria->estado=='cerrado')
            @else
                <a class=" col-3 btn btn-dark" style="width:50%; font-size:10px" onclick="window.location.reload()", href="" title="Actualizar">Actualizar Cambios</a>
                <a class=" col-3 btn btn-dark" style="width:50%; font-size:10px" href="{{ route('informe.emerg',$consultoria) }}" target="_blank" onclick="window.open(this.href, this.target, 'top=70,left=350,width=777,height=777'); return false;">Editar</a> 
                <!-- <a class=" col-3 btn btn-dark" style="width:50%; font-size:10px" href="{{ route('informe.emerg',$consultoria) }}" target="_blank" onclick="window.open(this.href, this.target, 'top=70,left=350,width=777,height=777'); return false;">Editar</a>  -->
            @endif
            </center>
        </div>
    </div> 
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{language: 'es', toolbar: [  'heading', '|', 'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify','imageUpload', ... ],
        } )        
        .catch( error => {
            console.error( error ); 
        } );
</script>
           
@endsection