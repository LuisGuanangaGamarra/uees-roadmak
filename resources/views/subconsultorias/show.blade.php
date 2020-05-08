@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('subconsultorias.show',$subConsultorias) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Consultoría
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
         
                <!-- DATOS DE CONSULTORIA-->
                <tr>
                    <th width="70px" scope="row">Consultoría:</th>
                    <td> ( {{$subConsultorias->grupo}} ) {{$subConsultorias->consultoria( $subConsultorias->grupo )->name}}</td>            
                </tr>

                <!-- DATOS DE SUB-INDICE-->
                <tr>
                    <th width="70px" scope="row">Nombre Sub-Consultoría:</th>
                    <td>{{$subConsultorias->name}}</td>
                </tr>
                <tr>
                    <th width="70px" scope="row">Requiere Índice</th>
                    <td>
                    @if($subConsultorias->req_indice==1)
                        VERDADERO
                    @else
                        FALSO
                    @endif
                  
                    </td>
                </tr>
                <tr>
                    <th width="70px" scope="row">Precio</th>
                    <td>{{$subConsultorias->precio}}</td>
                </tr>

                <tr>
                    <th width="70px" scope="row">Estado</th>
                    <td>{{$subConsultorias->estado}}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection