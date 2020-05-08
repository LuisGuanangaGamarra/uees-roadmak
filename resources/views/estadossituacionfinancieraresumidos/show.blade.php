@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadossituacionfinancieraresumidos.show', $situacionfinancieraresumido) }}
    </div>
</div>

<div class="card">
  <div class="card-header">
  Estado de Situacion Financiera Resumido
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
                <td>{{$situacionfinancieraresumido->idconsultoria}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Nombre:</th>
                <td>{{$situacionfinancieraresumido->name}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo1:</th>
                <td>{{$situacionfinancieraresumido->periodo1}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo2:</th>
                <td>{{$situacionfinancieraresumido->periodo2}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Periodo3:</th>
                <td>{{$situacionfinancieraresumido->periodo3}}</td>
                </tr>

            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection