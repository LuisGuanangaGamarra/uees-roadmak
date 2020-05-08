@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadossituacionfinanciera') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Estado de Situacion Financiera
    @can('estadossituacionfinanciera.create')
    <a href="{{route('estadossituacionfinanciera.create')}}"
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
           @foreach($estadosSituacionFinanciera as $situacionfinanciera)
            <tr>
                <td>{{$situacionfinanciera->id}}</td>
                <td>{{$situacionfinanciera->name}}</td>
                <td width="10px">
                    @can('estadossituacionfinanciera.show')
                        <a href="{{ route('estadossituacionfinanciera.show', $situacionfinanciera->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('estadossituacionfinanciera.edit')
                        <a href="{{ route('estadossituacionfinanciera.edit', $situacionfinanciera->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('estadossituacionfinanciera.destroy')
                    {!! Form::open(['route'=>['estadossituacionfinanciera.destroy', $situacionfinanciera->id], 
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
    {{$estadosSituacionFinanciera->links("pagination::bootstrap-4")}}
  </div>
</div>
@endsection