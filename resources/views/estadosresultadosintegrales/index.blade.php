@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadosresultadosintegrales') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Estado de Resultado Integral
    @can('estadosresultadosintegrales.create')
    <a href="{{route('estadosresultadosintegrales.create')}}"
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
           @foreach($estadosResultadosIntegrales as $resultadosintegrales)
            <tr>
                <td>{{$resultadosintegrales->id}}</td>
                <td>{{$resultadosintegrales->name}}</td>
                <td width="10px">
                    @can('estadosresultadosintegrales.show')
                        <a href="{{ route('estadosresultadosintegrales.show', $resultadosintegrales->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('estadosresultadosintegrales.edit')
                        <a href="{{ route('estadosresultadosintegrales.edit', $resultadosintegrales->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('estadosresultadosintegrales.destroy')
                    {!! Form::open(['route'=>['estadosresultadosintegrales.destroy', $resultadosintegrales->id], 
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
    {{$estadosResultadosIntegrales->links("pagination::bootstrap-4")}}
  </div>
</div>
@endsection