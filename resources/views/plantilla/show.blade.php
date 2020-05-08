@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('plantilla.show', $plantilla) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Plantilla
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
                <th width="70px" scope="row">Nombre: </th>
                <td>{{$plantilla->name}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Descripción: </th>
                <td>{{$plantilla->descripcion}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Plantilla:</th>
                    <td>   @include('plantilla.download') </td> 
                </tr>
                <tr>
                <th width="70px" scope="row">Años:</th>
                <td>{{$plantilla->anios}}</td>
                </tr>
               
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection