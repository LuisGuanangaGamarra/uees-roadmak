@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('consultoria_comprada.index') }}
    </div>
</div>

<div class="card">
  <div class="card-header">
    Consultorías compradas
  </div>

<div class="card-body">
<div class="container">

        <span style="color:#0056b3;">Semáforo de colores: </span>
        <table >
            <tbody>
                <tr><td><i>Estado</i></tr></td>
                <br>
                <tr><td><div style="width:23px; height:16px; background:#007bff;display:inline-block;margin-right: 10px;"></div><b>Formulario</b>   Formulario pendiente de llenar por el cliente</td> </tr>
                <tr><td><div style="width:23px; height:16px; background:#039D0C;display:inline-block;margin-right: 10px;"></div><b>Liberar</b>   Liberar la consultoria comprada para que el cliente cargue el EXCEL</td> </tr>
                <tr><td><div style="width:23px; height:16px; background:#77D353;display:inline-block;margin-right: 10px;"></div><b>Liberado</b>   Cliente comienza a subir el EXCEL correspondiente</td> </tr>
                <tr><td><div style="width:23px; height:16px; background:#FFBA5C;display:inline-block;margin-right: 10px;"></div><b>Cargado</b>   Archivo cargado por el cliente</td></tr>
                <tr><td><div style="width:23px; height:16px; background:#17a2b8;display:inline-block;margin-right: 10px;"></div><b>Procesado</b>   Resultados obtenidos</td></tr>
                <tr><td><div style="width:23px; height:16px; background:#F95F62;display:inline-block;margin-right: 10px;"></div><b>Cerrado</b>   Informe realizado</td></tr>
                <!--OTROS BOTONES-->
<!--                 <br>
                <tr><td><i>Otros botones</i></tr></td>
                <tr><td><div style="width:23px; height:16px; background:#17a2b8;display:inline-block;margin-right: 10px;"></div><b>Editar</b>   Editar los índices a procesar</td></tr>
                <tr><td><div style="width:23px; height:16px; background:#007bff;display:inline-block;margin-right: 10px;"></div><b>PULL</b>   Actualizar cambios creados desde el excel subido por el cliente ó excel procesado</td></tr>
                <tr><td><div style="width:23px; height:16px; background:#FFBA5C;display:inline-block;margin-right: 10px;"></div><b>Pendiente</b>   Proceso de revisión y análisis</td></tr> -->
                
                
            </tbody>

        </table>
        <br>

<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                    <tr>
                        <th>ID</th>
                        <th>CLIENTE</th>
                        <th>CONSULTORÍA</th>
                        <th>PERÍODOS</th>
                        <th>CONSULTOR</th>
                        <th>ARCHIVO</th>
                        <th>ESTADO </th>
                        <th>VER/EDIT. ARCHIVO</th>
                        <th>PROCESAR</th>
                        <th>EDITAR</th>
                        <th>INFORME</th>
                        
                    </tr>
            </thead>
            <tbody>
                @foreach($consultoria_comprada as $consultoria)
                    <tr >
                        <td>{{$consultoria->id}}</td>

                        <!-- DATOS DE CLIENTE-->
                        @foreach($consultoria->usuario_ById($consultoria->cliente) as $result  )
                            <td>{{$result->name}}</td>
                        @endforeach
        
                        
                        <!-- DATOS DE CONSULTORIA-->
                        <td>{{$consultoria->subConsultoriaById($consultoria->consultorias)->name}}</td>
                    

                        <td>{{$consultoria->num_periodos}}</td>
            
                        
                        <!-- DATOS DE CONSULTOR-->
                        @foreach($consultoria->usuario_ById($consultoria->consultor) as $result  )
                            <td>{{$result->name}}</td>
                        @endforeach
                        
                        <style>
                            #trash:hover, #trash a:hover {
                            color: red;
                            text-decoration:none; 
                            }
                        </style>
      
                        @if ($consultoria->archivo )
                            @if ($consultoria->estado=='pendiente' || $consultoria->estado=='procesando')
                            <td id="trash" >
                                <a href="javascript:;" data-toggle="modal" onclick="deleteReporte({{$consultoria->id}})" data-target="#modal_deleteArchivo">
                                    <center>
                                        <i class="fas fa-trash-alt"></i>
                                    </center>{{$consultoria->archivo}}
                                <a>
                            </td>
                            @else
                                <td width="10px" style="">
                            
                                </td>
                            @endif
                        @else 
                            <td width="10px" style="">
                           
                            </td>
                        @endif

                    <!--ESTADO: para que el cliente comience a subir los archivos correspondientes-->

                        <!--FORMULARIO: Formulario pendiente de llenar por el cliente-->
                        <td  width="10px">
                        @if($consultoria->archivo==NULL && $consultoria->estado=='consulta')
                                <a href="#" 
                                    class="btn btn-sm btn-primary disabled" >
                                    Formulario <i class="fas fa-file-alt"></i>
                                </a>

                        @elseif ($consultoria->archivo && $consultoria->estado=='pendiente')
                                <a href="#" 
                                    class="btn btn-sm btn-warning disabled" >
                                    Cargado
                                </a>
                        @elseif ($consultoria->archivo==NULL && $consultoria->estado=='por aceptar')
                            <a href="{{ route('bandeja.liberar',$consultoria->id)}}" 
                                class="btn btn-sm btn-success " style="background:#039D0C; border:none; ">
                                Liberar
                            </a>
                        @elseif ($consultoria->archivo  && $consultoria->estado=='procesando')
                        <a href="{{ route('bandeja.liberar',$consultoria->id)}}" 
                            class="btn btn-sm btn-success disabled" style="background:#17a2b8; border:none; ">
                            Procesado
                        </a>
                        @elseif ($consultoria->archivo  && $consultoria->estado=='cerrado')
                        <a href="{{ route('bandeja.liberar',$consultoria->id)}}" 
                            class="btn btn-sm btn-danger disabled" style=" border:none; ">
                            Cerrado
                        </a>
                        @else
                            <a href="#" 
                                class="btn btn-sm btn-success disabled">
                                Liberado
                            </a>
                        @endif
                        </td >
                        <!-- VER /EDITAR-->
                        <td  width="10px">
                        @if ($consultoria->archivo)
                            @can('onlyoffice.view')
                                <a href="{{ route('bandeja.showonlyoffice',$consultoria->id)}}" 
                                    class="btn btn-sm btn-danger">
                                    <i class="fas fa-eye "></i>
                                </a>


                                <!--ESTADO QUE INDICA QUE HUBO UN PROCESAMIENTO -->
                                @if ($consultoria->estado=='procesando'|| $consultoria->estado=='cerrado')
                                    <a href="{{ route('bandeja.showonlyoffice_procesado',$consultoria->id)}}" 
                                        class="btn btn-sm btn-info ">
                                        <i class="fas fa-eye "></i>
                                    </a>
                                    <a href="{{ "http://159.89.183.216:4000/download/?ip=$ip&fileName=procesado_". $consultoria->archivo}}" 
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-download"></i>
                                    </a>
                                @else 
                                    <a href="{{ route('bandeja.showonlyoffice_procesado',$consultoria->id)}}" 
                                        class="btn btn-sm btn-info disabled">
                                        <i class="fas fa-eye "></i>
                                    </a>
                                    <a href="{{ "http://159.89.183.216:4000/download/?ip=$ip&fileName=procesado_". $consultoria->archivo}}" 
                                        class="btn btn-sm btn-info disabled">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    
                                @endif

                            @endcan
                        @else 
                            @can('onlyoffice.view')
                                <a href="{{ route('bandeja.showonlyoffice',$consultoria->id)}}" 
                                    class="btn btn-sm btn-secondary disabled">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('bandeja.showonlyoffice_procesado',$consultoria->id)}}" 
                                        class="btn btn-sm btn-secondary disabled">
                                        <i class="fas fa-eye "></i>
                                </a>
                                <a href="{{ "http://159.89.183.216:4000/download/?ip=$ip&fileName=procesado_". $consultoria->archivo}}" 
                                    class="btn btn-sm btn-secondary disabled">
                                    <i class="fas fa-download"></i>
                                </a>
                                
                            @endcan

                        @endif
                        </td>

                        <!-- GUARDAR CAMBIOS-->
<!--                         <td width="10px">
                        @if ($consultoria->archivo)
                            @can('onlyoffice.pullfile')
                                <a  disabled  href="{{ route('bandeja.pullFile', $consultoria->id)}}" class="btn btn-sm btn-primary pull-right pull disabled">PROCESAR</a>
                            @endcan
                        @else 
                            @can('onlyoffice.pullfile')
                                <a  disabled  href="{{ route('bandeja.pullFile', $consultoria->id)}}" class="btn btn-sm btn-secondary pull-right disabled">PROCESAR</a>
                            @endcan

                        @endif

                        </td> -->

                        <!--  PROCESAR-->
                         <td width="10px">
                            @if ($consultoria->archivo)
                                <!--<a disabled href="{{ route('bandeja.procesar', $consultoria->id)}}" 
                                class="btn btn-sm btn-primary pull disabled" data-toggle="modal" data-target="#progress_bar_Modal"data-keyboard="false" data-backdrop="static">
                                Generar <i class="fas fa-file-excel"></i>
                                </a> -->
                                <!--<div data-toggle="modal" 
                                    data-target="#progress_bar_Modal"  data-keyboard="false" data-backdrop="static">
                                <a href="{{route('bandeja.procesar', $consultoria->id)}}" 
                                 class="btn btn-sm btn-primary pull disabled"><i  class="fa fa-file-excel"></i> Generar                                    
                                </a>
                                </div>-->

                                <div class="content_p">Espere un momento...!</div>
                                <div class="content_p2" style="display:none;">
                                    <div data-toggle="modal" 
                                        data-target="#progress_bar_Modal"  data-keyboard="false" data-backdrop="static">
                                    <a href="{{route('bandeja.procesar', $consultoria->id)}}" 
                                    class="btn btn-sm btn-primary pull disabled"><i  class="fa fa-file-excel"></i> Generar                                    
                                    </a>
                                    </div>
                                </div>
                            
                            @else 
                                <a disabled href="{{ route('bandeja.procesar', $consultoria->id)}}" 
                                class="btn btn-sm btn-secondary disabled">
                                Generar <i class="fas fa-file-excel"></i>
                                </a>
                            
                            @endif
                        </td> 

                        <!--  EDITAR-->
                        <td  width="10px">
                        <!-- DATOS DE CONSULTORIA COMPRADA-->
                    
                            @if ($consultoria->estado=='consulta')
                                    <a href="{{ route('comprar.edit',$consultoria->id)}}" 
                                        class="btn btn-sm btn-secondary disabled">
                                        Indices
                                    </a>
                                @else 
                                    <a href="{{ route('comprar.edit',$consultoria->id)}}" 
                                        class="btn btn-sm btn-info">
                                        Indices
                                    </a>
                            @endif
            
                        </td>


                        <td width="10px">
                            @if( $consultoria->estado=='procesando' ||  $consultoria->estado=='cerrado')
                                <a href="{{ route('informe.index', $consultoria->id)}}"
                                    class="btn btn-sm btn-info">
                                    
                                    <i class="fas fa-address-book"></i>
                                    Informe
                                </a>
                            @else
                                <a href="{{ route('informe.index', $consultoria->id)}}" 
                                        class="btn btn-sm btn-secondary disabled">
                                        
                                        <i class="fas fa-address-book"></i>
                                        Informe
                                    </a>
                            @endif    
                        </td>




                    
                    </tr>
                @endforeach
            </tbody>


    </table>
</div>
</div>
</div>


@endsection

@section('scripts')
<script>
var els = document.getElementsByClassName("pull");
Array.prototype.forEach.call(els, function(el) {
    setTimeout(function(){el.classList.remove("disabled")},7000);

});
</script>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content_p").fadeOut(1500);
    },7000);
 
    setTimeout(function() {
        $(".content_p2").fadeIn(1500);
    },8000);
});
</script>

@endsection
