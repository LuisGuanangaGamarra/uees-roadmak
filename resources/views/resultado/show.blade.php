@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('resultado.show', $resultados) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Resultado
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
                <th width="70px" scope="row">Nombre:</th>
                <td>{{$resultados->name}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Nivel 1:</th>
                @if($resultados->type_1=='IN')
                    <td>Ingresos</td>
                @endif
                @if($resultados->type_1=='CO')
                    <td>Costos</td>
                @endif
                @if($resultados->type_1=='GA')
                    <td>Gastos</td>
                @endif
                
                </tr>
                <!---<tr>
                @if($resultados->type_1!='PT')
                    <th width="70px" scope="row">Nivel 2</th>
                    @if($resultados->type_2=='AC')
                        <td>Activo Corriente</td>
                    @endif    
                    @if($resultados->type_2=='ANC')
                        <td>Activo No Corriente</td>
                    @endif    
                    @if($resultados->type_2=='PC')
                        <td>Pasivo Corriente</td>
                    @endif   
                    @if($resultados->type_2=='PNC')
                        <td>Pasivo No Corriente</td>
                    @endif  
                @endif
                </tr>-->
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection