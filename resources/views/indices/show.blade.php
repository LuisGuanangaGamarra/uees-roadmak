@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
   
    </div>
</div>
<div class="card">
  <div class="card-header">
    Índices
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
                    <th width="200px" scope="row">Nombres: </th>
                    <td>{{$indice->name}}</td>
                </tr>

                <tr>
                    <th width="200px" scope="row">Posición de cuenta: </th>
                    <td>{{$indice->posicion_cuenta}}</td>
                </tr>

                <tr>
                    <th width="200px" scope="row">Fórmula: </th>
                    <td>{{$indice->formula}}</td>
                </tr>

                <tr>
                    <th width="200px" scope="row">Posición fórmula: </th>
                    <td>{{$indice->posicion_formula}}</td>
                </tr>
                
                <tr>
                    <th width="200px" scope="row">Estado Financiero: </th>
                    <td>{{$indice->name_estado}}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection