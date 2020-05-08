@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('roles.show', $role) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Rol
  </div>
  <div class="card-body">
  <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <!-- <th scope="col">#</th>
                <th scope="col">First</th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                <th width="70px" scope="row">Nombre:</th>
                <td>{{$role->name}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Slug:</th>
                <td>{{$role->slug}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Descripción:</th>
                <td>{{$role->description}}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection