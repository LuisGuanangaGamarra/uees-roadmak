@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('bandeja_mis_consultorias.index') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Mis consultorías
  </div>

  <div class="card-body">
  <div class="container">


        <span style="color:#0056b3;">Semáforo de colores: </span>
        <table >
            <tbody>
                <tr><td><i>Estado</i></tr></td>
                <br>
                <tr><td><div style="width:23px; height:16px; background:#007bff;display:inline-block;margin-right: 10px;"></div><b>Formulario</b>   Formulario pendiente de llenar</td></tr>
                <tr><td><div style="width:23px; height:16px; background:#6c757d;display:inline-block;margin-right: 10px;"></div><b>Sin Liberar</b>   Requiere la liberación del Consultor asignado</td> </tr>
                <tr><td><div style="width:23px; height:16px; background:#039D0C;display:inline-block;margin-right: 10px;"></div><b>Fichero</b>   Requiere que se comience a subir el EXCEL correspondiente</td></tr>
                <tr><td><div style="width:23px; height:16px; background:#FFBA5C;display:inline-block;margin-right: 10px;"></div><b>Pendiente</b>   Proceso de revisión y análisis</td></tr>
                <tr><td><div style="width:23px; height:16px; background:#F95F62;display:inline-block;margin-right: 10px;"></div><b>Cerrado</b>   Resultados obtenidos</td></tr>
                
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
                        <th>PERIODOS</th>

                        @if(Auth::user()->isRole('Cliente'))
                        @else
                        <th>CONSULTOR</th>
                        @endif

                        <th>ARCHIVO</th>
                        
                        <th>ESTADO</th>
                        <th>INFORME</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultoria_comprada as $consultoria)
                        <tr>
                            <td>{{$consultoria->id}}</td>

                            <!-- DATOS DE CLIENTE-->
                            @foreach($consultoria->usuario_ById($consultoria->cliente) as $result  )
                                <td style="text-align:center">{{$result->name}}</td>
                            @endforeach



                            <!-- DATOS DE CONSULTORIA-->
                            <td style="text-align:center">{{$consultoria->subConsultoriaById($consultoria->consultorias)->name}}</td>
                        

                            <td style="text-align:center">{{$consultoria->num_periodos}}</td>


                            @if(Auth::user()->isRole('Cliente'))
                              
                            @else
                                <!-- DATOS DE CONSULTOR-->
                                @foreach($consultoria->usuario_ById($consultoria->consultor) as $result  )
                                    <td style="text-align:center">{{$result->name}}</td>
                                @endforeach
                            @endif


                            <!--ARCHIVO-->
                            @if($consultoria->archivo!=NULL )
                                <td>{{$consultoria->archivo}}</td>
                            @else 
                            <td width="10px" style="">
                                    Sin carga
                            </td>
                            @endif

                            <!--ESTADO-->
                            @if($consultoria->archivo==NULL && $consultoria->estado=='consulta')
                            <td>
                            <a href="{{ route('formulario.index', $consultoria->id)}}" 
                            class="btn btn-sm btn-primary"   >
                                        Formulario  <i class="fas fa-file-alt"></i>
                                    </a>
                            </td>
                            @elseif($consultoria->estado=='activo')
                            <td width="10px">
                                    <a href="{{ route('bandeja.index_file', $consultoria->id)}}" 
                                        class="btn btn-sm btn-success" style="background:#039D0C; border:none; ">
                                        Fichero  <i class="fas fa-file-excel"></i>
                                    </a>
                            </td>

                            @elseif ($consultoria->archivo==NULL && $consultoria->estado=='por aceptar')
                            <td width="10px">
                                    <a href="#" 
                                        class="btn btn-sm btn-secondary disabled" >
                                        Sin Liberar
                                    </a>
                            </td>


                            @elseif ($consultoria->archivo && $consultoria->estado=='pendiente')
                            <td width="10px">
                                    <a href="#" 
                                        class="btn btn-sm btn-warning disabled">
                                        Pendiente
                                    </a>
                            </td>

                            @elseif ($consultoria->archivo  && $consultoria->estado=='procesando')
                            <td width="10px">
                                    <a href="#" 
                                        class="btn btn-sm btn-warning disabled">
                                        Pendiente
                                    </a>
                            </td>
                            @else 
                            <td width="10px">
                                    <a href="#" 
                                        class="btn btn-sm btn-danger disabled">
                                        Cerrado
                                    </a>
                            </td>
                            @endif
                
                            <td width="10px">
                                @if($consultoria->archivo && $consultoria->isInforme($consultoria->id))

                                    @if($consultoria->estado=='cerrado')<!--POR SI EXISTEN MÁS ESTADOS-->
                                        <a href="{{ route('informe.index_cliente', $consultoria->id)}}" 
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-address-book"></i>
                                            Informe
                                        </a>
                                    @else
                                        <a href="{{ route('informe.index_cliente', $consultoria->id)}}" 
                                            class="btn btn-sm btn-info disabled">
                                            
                                            <i class="fas fa-address-book"></i>
                                            Informe
                                        </a>
                                    @endif    

                                @else
                                    <a href="{{ route('informe.index_cliente', $consultoria->id)}}" 
                                            class="btn btn-sm btn-info disabled">
                                            
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
</div>
@endsection



    @section('scripts')
@endsection