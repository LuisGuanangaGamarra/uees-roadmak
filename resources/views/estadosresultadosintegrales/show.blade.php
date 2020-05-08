@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadosresultadosintegrales.show', $estadosResultadosIntegrales) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Indice
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
            
                <th width="70px" scope="row">Consultoria:</th>
                <td>{{$estadosResultadosIntegrales->idconsultoria}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Nombre:</th>
                <td>{{$estadosResultadosIntegrales->name}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo1:</th>
                <td>{{$estadosResultadosIntegrales->periodo1}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo2:</th>
                <td>{{$estadosResultadosIntegrales->periodo2}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo3:</th>
                <td>{{$estadosResultadosIntegrales->periodo3}}</td>
                </tr>

            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection