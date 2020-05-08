@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadosflujosefectivos') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Estado de Flujos de Efectivos
    @can('estadosflujosefectivos.create')
    <a href="{{route('estadosflujosefectivos.create')}}"
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
           @foreach($estadosFlujosEfectivo as $flujoefectivo)
            <tr>
                <td>{{$flujoefectivo->id}}</td>
                <td>{{$flujoefectivo->name}}</td>
                <td width="10px">
                    @can('estadosflujosefectivos.show')
                        <a href="{{ route('estadosflujosefectivos.show', $flujoefectivo->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('estadosflujosefectivos.edit')
                        <a href="{{ route('estadosflujosefectivos.edit', $flujoefectivo->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('estadosflujosefectivos.destroy')
                    {!! Form::open(['route'=>['estadosflujosefectivos.destroy', $flujoefectivo->id], 
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
    {{$estadosFlujosEfectivo->links("pagination::bootstrap-4")}}
  </div>
</div>
@endsection