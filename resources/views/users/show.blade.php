@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('users.show', $user) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Usuario
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
                <th width="70px" scope="row">Nombres:</th>
                <td>{{$user->name}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Apellidos:</th>
                <td>{{$user->lastname}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Email:</th>
                <td>{{$user->email}}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection