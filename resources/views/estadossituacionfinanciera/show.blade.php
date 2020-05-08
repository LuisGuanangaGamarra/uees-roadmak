@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadossituacionfinanciera.show', $estadosSituacionFinanciera) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
  Estado de Situacion Financiera
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
                <td>{{$estadosSituacionFinanciera->idconsultoria}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Nombre:</th>
                <td>{{$estadosSituacionFinanciera->name}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo1:</th>
                <td>{{$estadosSituacionFinanciera->periodo1}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo2:</th>
                <td>{{$estadosSituacionFinanciera->periodo2}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo3:</th>
                <td>{{$estadosSituacionFinanciera->periodo3}}</td>
                </tr>

            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection