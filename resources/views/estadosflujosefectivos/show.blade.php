@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadosflujosefectivos.show', $estadosFlujosEfectivo) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
  Estado de Flujos de Efectivo
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
                <td>{{$estadosFlujosEfectivo->idconsultoria}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Nombre:</th>
                <td>{{$estadosFlujosEfectivo->name}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo1:</th>
                <td>{{$estadosFlujosEfectivo->periodo1}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo2:</th>
                <td>{{$estadosFlujosEfectivo->periodo2}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo3:</th>
                <td>{{$estadosFlujosEfectivo->periodo3}}</td>
                </tr>

            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection