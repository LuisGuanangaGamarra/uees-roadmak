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
                <!--<td width="10px">
                    @can('roles.destroy')
                    {!! Form::open(['route'=>['roles.destroy', $role->id], 
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
