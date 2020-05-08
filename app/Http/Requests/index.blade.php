@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('Estado de Situacion Financiera Resumidos') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Estado de Situacion Financiera Resumido
    @can('estadossituacionfinancieraresumidos.create')
    <a href="{{route('estadossituacionfinancieraresumidos.create')}}"
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
           @foreach($estadosSituacionFinancieraResumidos as $situacionfinancieraresumido)
            <tr>
                <td>{{$situacionfinancieraresumido->id}}</td>
                <td>{{$situacionfinancieraresumido->name}}</td>
                <td width="10px">
                    @can('estadossituacionfinancieraresumidos.show')
                        <a href="{{ route('estadossituacionfinancieraresumidos.show', $situacionfinancieraresumido->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('estadossituacionfinancieraresumidos.edit')
                        <a href="{{ route('estadossituacionfinancieraresumidos.edit', $situacionfinancieraresumido->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('estadossituacionfinancieraresumidos.destroy')
                    {!! Form::open(['route'=>['estadossituacionfinancieraresumidos.destroy', $situacionfinancieraresumido->id], 
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
    {{$estadosSituacionFinancieraResumidos->links("pagination::bootstrap-4")}}
  </div>
</div>
@endsection