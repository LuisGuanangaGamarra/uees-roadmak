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
      {!! Form::model($role, ['route' =>['roles.update', $role->id],
      'method' => 'PUT']) !!}

        @include('roles.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection