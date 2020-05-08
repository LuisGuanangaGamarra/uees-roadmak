@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('ci.show', $consultoriaPlantilla) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Consultoria
  </div>
  <div class="card-body">
  <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <!-- <th scope="col">#</th>
                <th scope="col">First</th> -->
                </tr>
            </thead>
            <tbody>
         
                <tr>
                    <th width="70px" scope="row">Consultoría:</th>
                    <!-- DATOS DE CONSULTORIA-->
                    <td> ( {{$consultoriaPlantilla->id_consultoria}} ) {{$consultoriaPlantilla->consultoria( $consultoriaPlantilla->id_consultoria )->name}}</td>            
                </tr>
                <tr>
                    <th width="70px" scope="row">Índice:</th>
                    <!-- DATOS DE INDICE-->
                    @foreach($consultoriaPlantilla->plantilla_ById($consultoriaPlantilla->id_plantilla) as $result  )
                        <td>( {{$result->id}} )  {{$result->name}}</td>

                    @endforeach
                </tr>

                <tr>
                    <th width="70px" scope="row">Año de la consultoría:</th>
                    @foreach($consultoriaPlantilla->plantilla_ById($consultoriaPlantilla->id_plantilla) as $result  )

                        <td> {{$result->anios}} </td>
                    @endforeach
                </tr>

               <!--  <tr>
                <th width="70px" scope="row">Estado:</th>
                <td>{{$consultoriaPlantilla->default}}</td>
                </tr> -->
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection