@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('roles') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Roles
    @can('roles.create')
    <a href="{{route('roles.create')}}"
    class="btn btn-primary pull-right">
        Crear
    </a>
    @endcan
  </div>
  <div class="card-body">
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
           @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td width="10px">
                    @can('roles.show')
                        <a href="{{ route('roles.show', $role->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('roles.edit')
                        <a href="{{ route('roles.edit', $role->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('roles.destroy')
                    {!! Form::open(['route'=>['roles.destroy', $role->id], 
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
    {{$roles->links("pagination::bootstrap-4")}}
  </div>
</div>
@endsection