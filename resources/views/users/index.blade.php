@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('users') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Usuarios
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
           @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td width="10px">
                    @can('users.show')
                        <a href="{{ route('users.show', $user->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('users.edit')
                        <a href="{{ route('users.edit', $user->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>
               <!--  <td width="10px">
                    @can('users.destroy')
                    {!! Form::open(['route'=>['users.destroy', $user->id], 
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