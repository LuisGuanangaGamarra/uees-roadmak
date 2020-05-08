@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('plantilla') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Plantilla
    <!-- @can('roles.create')
        <a href="{{route('roles.create')}}"
        class="btn btn-primary pull-right">
            Crear
        </a>
    @endcan -->
  </div>

<div class="card-body">
<div class="container">
<div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th width="10px">ID</th>
                <th>NOMBRE</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
           @foreach($plantilla as $plantillas)
            <tr>
                <td>{{$plantillas->id}}</td>
                <td>{{$plantillas->name}}</td>
                <td width="10px">
                    @can('plantilla.show')
                        <a href="{{ route('plantilla.show', $plantillas->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('plantilla.edit')
                        <a href="{{ route('plantilla.edit', $plantillas->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>
                <!--<td width="10px">
                    @can('plantilla.destroy')
                    {!! Form::open(['route'=>['plantilla.destroy', $plantillas->id], 
                        'method'=>'DELETE']) !!}
                        <button class="btn btn-sm btn-danger">
                            Eliminar
                        </button>
                    {!! Form::close() !!}
                    @endcan
                </td> -->
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