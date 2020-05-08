@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('balance') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Cuentas
    @can('balance.create')
    <a href="{{route('balance.create')}}"
    class="btn btn-primary pull-right">
        Crear
    </a>
    @endcan
  </div>
  <div class="card-body ">
    <div class="table-responsive">
    <table class="table table-strip table-hover">
        <thead>
            <tr>
                <th width="10px">ID</th>
                <th>NOMBRE</th>
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
           @foreach($cuentas_balance as $cuenta)
            <tr>
                <td>{{$cuenta->id}}</td>
                <td>{{$cuenta->name}}</td>
                <td width="10px">
                    @can('balance.show')
                        <a href="{{ route('balance.show', $cuenta->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('balance.edit')
                        <a href="{{ route('balance.edit', $cuenta->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('balance.destroy')
                    {!! Form::open(['route'=>['balance.destroy', $cuenta->id], 
                        'method'=>'DELETE']) !!}
                        <button class="btn btn-sm btn-danger">
                            Eliminar
                        </button>
                    {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
           @endforeach
        </tbody>

    </table>
    </div>
    {{$cuentas_balance->links("pagination::bootstrap-4")}}
  </div>
</div>
@endsection