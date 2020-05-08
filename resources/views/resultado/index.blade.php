@extends('template.index')

@section('content')
<div class="row">
<div class="col-md-12">
        {{ Breadcrumbs::render('resultado') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Resultados
    @can('resultado.create')
    <a href="{{route('resultado.create')}}"
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
           @foreach($resultado as $resultados)
            <tr>
                <td>{{$resultados->id}}</td>
                <td>{{$resultados->name}}</td>
                <td width="10px">
                    @can('resultado.show')
                        <a href="{{ route('resultado.show', $resultados->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('resultado.edit')
                        <a href="{{ route('resultado.edit', $resultados->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('resultado.destroy')
                    {!! Form::open(['route'=>['resultado.destroy', $resultados->id], 
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
    {{$resultado->links("pagination::bootstrap-4")}}
  </div>
</div>
@endsection