@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('flujos') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Flujos
    @can('flujos.create')
    <a href="{{route('flujos.create')}}"
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
           @foreach($flujos as $flujo)
            <tr>
                <td>{{$flujo->id}}</td>
                <td>{{$flujo->name}}</td>
                <td width="10px">
                    @can('flujos.show')
                        <a href="{{ route('flujos.show', $flujo->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('flujos.edit')
                        <a href="{{ route('flujos.edit', $flujo->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('flujos.destroy')
                    {!! Form::open(['route'=>['flujos.destroy', $flujo->id], 
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
    {{$flujos->links("pagination::bootstrap-4")}}
  </div>
</div>
@endsection