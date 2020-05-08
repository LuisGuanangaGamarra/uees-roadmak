@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('cuentas.index',$estado_financiero) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    {{$estado_financiero->name_estado}}
  </div>

<div class="card-body">
<div class="container">
<div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
              <!--   <th width="10px">ID</th> -->
                <th>NOMBRE</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                
            </tr>
        </thead>
        <tbody>
           @foreach($cuentas as $lista_cuentas)
            <tr>
                <!-- <td>{{$lista_cuentas->id}}</td> -->
                <td>{{$lista_cuentas->name}}</td>
                <td width="10px">
                    @can('cuentas.show')
                        <a href="{{ route('cuentas.show', $lista_cuentas->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('cuentas.edit')
                        <a href="{{ route('cuentas.edit', $lista_cuentas->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>

            </tr>
           @endforeach
        </tbody>

        </table>
    </div>
</div>
</div>
</div>
@endsection
    @section('scripts')
@endsection
