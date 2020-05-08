@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('cuentas.show',$cuentas,$cuentas->estadoFinancieroById($cuentas->id_estado_financiero) ) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Cuentas
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
            
                <th width="70px" scope="row">Estado Financiero:</th>
                <td>{{$cuentas->estadoFinancieroById($cuentas->id_estado_financiero)->name_estado}}</td>
                <td>{{$cuentas->id_estado_financiero}}</td>
                </tr>
                <tr>
                    <th width="70px" scope="row">Nombre:</th>
                    <td>{{$cuentas->name}}</td>
                </tr>
                <tr>
                    <th width="70px" scope="row">Posición Cuenta:</th>
                    <td>{{$cuentas->posicion_cuenta}}</td>
                </tr>


                <tr>
                    <th width="70px" scope="row">Fórmula:</th>
                    <td>{{$cuentas->formula}}</td>
                </tr>

                <tr>
                    <th width="70px" scope="row">Posición fórmula:</th>
                    <td>{{$cuentas->posicion_formula}}</td>
                </tr>

            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection